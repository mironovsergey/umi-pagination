# UMI.CMS пагинация для постраничного вывода

Данный макрос имеет следующие отличия от стандартного `numpages`:

* позволяет указать количество отображаемых элементов рядом с первой и последней страницами
* позволяет указать количество отображаемых элементов рядом с текущей страницей

## Параметры

Первые четыре параметра аналогичны соответствующим параметрам макроса `numpages`.
Пятый параметр заменен двумя следующими:

* `boundary_count` - количество отображаемых элементов рядом с первой и последней страницами
* `sibling_count` - количество отображаемых элементов рядом с текущей страницей

## Примеры 

1. `udata://custom/pagination/100/5/`

```xml
<udata module="custom" method="pagination">
    <items>
        <item link="?p=0" page-num="0" is-active="1">
            <![CDATA[ 1 ]]>
        </item>
        <item link="?p=1" page-num="1">
            <![CDATA[ 2 ]]>
        </item>
        <item link="?p=2" page-num="2">
            <![CDATA[ 3 ]]>
        </item>
        <item link="?p=3" page-num="3">
            <![CDATA[ 4 ]]>
        </item>
        <item link="?p=4" page-num="4">
            <![CDATA[ 5 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=19" page-num="19">
            <![CDATA[ 20 ]]>
        </item>
    </items>
    <toend_link page-num="19">
        <![CDATA[ ?p=19 ]]>
    </toend_link>
    <tonext_link page-num="1">
        <![CDATA[ ?p=1 ]]>
    </tonext_link>
    <current-page>
        <![CDATA[ 1 ]]>
    </current-page>
    <page-count>
        <![CDATA[ 20 ]]>
    </page-count>
</udata>
```

2. `udata://custom/pagination/100/5/?p=9`

```xml
<udata module="custom" method="pagination">
    <items>
        <item link="?p=0" page-num="0">
            <![CDATA[ 1 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=8" page-num="8">
            <![CDATA[ 9 ]]>
        </item>
        <item link="?p=9" page-num="9" is-active="1">
            <![CDATA[ 10 ]]>
        </item>
        <item link="?p=10" page-num="10">
            <![CDATA[ 11 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=19" page-num="19">
            <![CDATA[ 20 ]]>
        </item>
    </items>
    <tobegin_link page-num="0">
        <![CDATA[ ?p=0 ]]>
    </tobegin_link>
    <toend_link page-num="19">
        <![CDATA[ ?p=19 ]]>
    </toend_link>
    <toprev_link page-num="8">
        <![CDATA[ ?p=8 ]]>
    </toprev_link>
    <tonext_link page-num="10">
        <![CDATA[ ?p=10 ]]>
    </tonext_link>
    <current-page>
        <![CDATA[ 10 ]]>
    </current-page>
    <page-count>
        <![CDATA[ 20 ]]>
    </page-count>
</udata>
```

3. `udata://custom/pagination/100/5/default/p/2/?p=9`

```xml
<udata module="custom" method="pagination">
    <items>
        <item link="?p=0" page-num="0">
            <![CDATA[ 1 ]]>
        </item>
        <item link="?p=1" page-num="1">
            <![CDATA[ 2 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=8" page-num="8">
            <![CDATA[ 9 ]]>
        </item>
        <item link="?p=9" page-num="9" is-active="1">
            <![CDATA[ 10 ]]>
        </item>
        <item link="?p=10" page-num="10">
            <![CDATA[ 11 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=18" page-num="18">
            <![CDATA[ 19 ]]>
        </item>
        <item link="?p=19" page-num="19">
            <![CDATA[ 20 ]]>
        </item>
    </items>
    <tobegin_link page-num="0">
        <![CDATA[ ?p=0 ]]>
    </tobegin_link>
    <toend_link page-num="19">
        <![CDATA[ ?p=19 ]]>
    </toend_link>
    <toprev_link page-num="8">
        <![CDATA[ ?p=8 ]]>
    </toprev_link>
    <tonext_link page-num="10">
        <![CDATA[ ?p=10 ]]>
    </tonext_link>
    <current-page>
        <![CDATA[ 10 ]]>
    </current-page>
    <page-count>
        <![CDATA[ 20 ]]>
    </page-count>
</udata>
```

4. `udata://custom/pagination/100/5/default/p/1/2/?p=9`

```xml
<udata module="custom" method="pagination">
    <items>
        <item link="?p=0" page-num="0">
            <![CDATA[ 1 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=7" page-num="7">
            <![CDATA[ 8 ]]>
        </item>
        <item link="?p=8" page-num="8">
            <![CDATA[ 9 ]]>
        </item>
        <item link="?p=9" page-num="9" is-active="1">
            <![CDATA[ 10 ]]>
        </item>
        <item link="?p=10" page-num="10">
            <![CDATA[ 11 ]]>
        </item>
        <item link="?p=11" page-num="11">
            <![CDATA[ 12 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=19" page-num="19">
            <![CDATA[ 20 ]]>
        </item>
    </items>
    <tobegin_link page-num="0">
        <![CDATA[ ?p=0 ]]>
    </tobegin_link>
    <toend_link page-num="19">
        <![CDATA[ ?p=19 ]]>
    </toend_link>
    <toprev_link page-num="8">
        <![CDATA[ ?p=8 ]]>
    </toprev_link>
    <tonext_link page-num="10">
        <![CDATA[ ?p=10 ]]>
    </tonext_link>
    <current-page>
        <![CDATA[ 10 ]]>
    </current-page>
    <page-count>
        <![CDATA[ 20 ]]>
    </page-count>
</udata>
```

5. `udata://custom/pagination/100/5/default/p/1/2/?p=9`

```xml
<udata module="custom" method="pagination">
    <items>
        <item link="?p=0" page-num="0">
            <![CDATA[ 1 ]]>
        </item>
        <item is-disabled="1">
            <![CDATA[ ... ]]>
        </item>
        <item link="?p=15" page-num="15">
            <![CDATA[ 16 ]]>
        </item>
        <item link="?p=16" page-num="16">
            <![CDATA[ 17 ]]>
        </item>
        <item link="?p=17" page-num="17">
            <![CDATA[ 18 ]]>
        </item>
        <item link="?p=18" page-num="18">
            <![CDATA[ 19 ]]>
        </item>
        <item link="?p=19" page-num="19" is-active="1">
            <![CDATA[ 20 ]]>
        </item>
    </items>
    <tobegin_link page-num="0">
        <![CDATA[ ?p=0 ]]>
    </tobegin_link>
    <toprev_link page-num="18">
        <![CDATA[ ?p=18 ]]>
    </toprev_link>
    <current-page>
        <![CDATA[ 20 ]]>
    </current-page>
    <page-count>
        <![CDATA[ 20 ]]>
    </page-count>
</udata>
```

## Шаблон

```xsl
<xsl:template match="udata" mode="pagination" />

<xsl:template match="udata[items/item]" mode="pagination">
    <nav aria-label="pagination">
        <ul class="pagination">
            <xsl:apply-templates select="current()" mode="pagination-prev" />
            <xsl:apply-templates select="items/item" mode="pagination-item" />
            <xsl:apply-templates select="current()" mode="pagination-next" />
        </ul>
    </nav>
</xsl:template>

<xsl:template match="item" mode="pagination-item">
    <li class="page-item">
        <a href="{@link}" class="page-link">
            <xsl:value-of select="node()" />
        </a>
    </li>
</xsl:template>

<xsl:template match="item[@is-active = 1]" mode="pagination-item">
    <li class="page-item active" aria-current="page">
        <a class="page-link" tabindex="-1">
            <xsl:value-of select="node()" />
        </a>
    </li>
</xsl:template>

<xsl:template match="item[@is-disabled = 1]" mode="pagination-item">
    <li class="page-item disabled">
        <a class="page-link" tabindex="-1">
            <xsl:value-of select="node()" />
        </a>
    </li>
</xsl:template>

<xsl:template match="udata" mode="pagination-prev">
    <li class="page-prev disabled">
        <a class="page-link" tabindex="-1" aria-disabled="true" aria-label="Предыдущая">
            Предыдущая
        </a>
    </li>
</xsl:template>

<xsl:template match="udata[toprev_link]" mode="pagination-prev">
    <li class="page-prev">
        <a href="{toprev_link}" class="page-link" aria-label="Предыдущая">
            Предыдущая
        </a>
    </li>
</xsl:template>

<xsl:template match="udata" mode="pagination-next">
    <li class="page-next disabled">
        <a class="page-link" tabindex="-1" aria-disabled="true" aria-label="Следующая">
            Следующая
        </a>
    </li>
</xsl:template>

<xsl:template match="udata[tonext_link]" mode="pagination-next">
    <li class="page-next">
        <a href="{tonext_link}" class="page-link" aria-label="Следующая">
            Следующая
        </a>
    </li>
</xsl:template>
```