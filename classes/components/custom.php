<?php

class custom extends def_module
{

    public function cms_callMethod($method_name, $args)
    {
        return call_user_func_array([$this, $method_name], $args);
    }

    public function __call($method, $args)
    {
        throw new publicException('Method ' . get_class($this) . '::' . $method . ' doesn\'t exist');
    }

    /**
     * Создает пагинацию для постраничного вывода
     * @param int $total Общее количество страниц
     * @param int $per_page Количество страниц, выводимых на одной странице
     * @param string $template Имя шаблона, по которому следует выводить список страниц
     * @param string $var_name Имя переменной, которая будет использоваться
     * для задания номера страницы пагинации в URL в списке страниц
     * @param int $boundary_count Количество отображаемых элементов рядом с первой и последней страницами
     * @param int $sibling_count Количество отображаемых элементов рядом с текущей страницей
     * @return mixed
     * @throws coreException
     * @throws ErrorException
     */
    public function pagination(
        int    $total = 0,
        int    $per_page = 0,
        string $template = 'default',
        string $var_name = 'p',
        int    $boundary_count = 1,
        int    $sibling_count = 1
    )
    {
        if ($per_page === 0) {
            $per_page = $total;
        }

        // Текущая страница
        $current_page = (int) getRequest($var_name) + 1;

        // Количество страниц
        $page_count = (int) ceil($total / $per_page);

        $pagination = umiPagenum::generateNumPage($total, $per_page, $template, $var_name, $page_count);

        $items = [];

        if (is_array($pagination['items'])) {
            $start_pages = self::range(
                1,
                min($boundary_count, $page_count)
            );

            $end_pages = self::range(
                max(
                    $page_count - $boundary_count + 1,
                    $boundary_count + 1
                ),
                $page_count
            );

            $siblings_start = max(
                min(
                    $current_page - $sibling_count,
                    $page_count - $boundary_count - $sibling_count * 2 - 1
                ),
                $boundary_count + 2
            );

            $siblings_end = min(
                max(
                    $current_page + $sibling_count,
                    $boundary_count + $sibling_count * 2 + 2
                ),
                count($end_pages) > 0 ? $end_pages[0] - 2 : $page_count - 1
            );

            $start_ellipsis = [];

            if ($siblings_start > $boundary_count + 2) {
                $start_ellipsis = ['start-ellipsis'];
            } elseif ($boundary_count + 1 < $page_count - $boundary_count) {
                $start_ellipsis = [$boundary_count + 1];
            }

            $end_ellipsis = [];

            if ($siblings_end < $page_count - $boundary_count - 1) {
                $end_ellipsis = ['end-ellipsis'];
            } elseif ($page_count - $boundary_count > $boundary_count) {
                $end_ellipsis = [$page_count - $boundary_count];
            }

            $item_list = array_merge(
                $start_pages,
                $start_ellipsis,
                self::range($siblings_start, $siblings_end),
                $end_ellipsis,
                $end_pages
            );

            foreach ($item_list as $value) {
                $item = [];

                if (is_int($value)) {
                    $index = array_search($value, array_column(
                        $pagination['items']['nodes:item'], 'node:num'
                    ));

                    if ($index !== false) {
                        $item = $pagination['items']['nodes:item'][$index];
                    }
                } elseif (strpos($value, 'ellipsis') !== false) {
                    $item['attribute:is-disabled'] = true;
                    $item['node:num'] = '...';
                }

                $items[] = $item;
            }
        }

        $data = [];
        $data['subnodes:items'] = $items;

        if (!empty($pagination['tobegin_link'])) {
            $data['tobegin_link'] = $pagination['tobegin_link'];
        }

        if (!empty($pagination['toend_link'])) {
            $data['toend_link'] = $pagination['toend_link'];
        }

        if (!empty($pagination['toprev_link'])) {
            $data['toprev_link'] = $pagination['toprev_link'];
        }

        if (!empty($pagination['tonext_link'])) {
            $data['tonext_link'] = $pagination['tonext_link'];
        }

        $data['current-page'] = $current_page;
        $data['page-count'] = $page_count;

        return def_module::parseTemplate(null, $data);
    }

    /**
     * Создаёт массив, содержащий диапазон чисел
     * @param int $start Первое значение последовательности
     * @param int $end Последнее значение последовательности
     * @return array
     */
    private static function range(int $start, int $end): array
    {
        $array = [];

        if ($end - $start + 1 > 0) {
            $array = range($start, $end);
        }

        return $array;
    }

}