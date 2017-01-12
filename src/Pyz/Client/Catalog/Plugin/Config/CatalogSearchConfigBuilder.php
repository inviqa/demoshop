<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Config;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\FacetConfigTransfer;
use Generated\Shared\Transfer\PaginationConfigTransfer;
use Generated\Shared\Transfer\SortConfigTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\PaginationConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SearchConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface;
use Spryker\Shared\Search\SearchConfig;

/**
 * @method \Spryker\Client\Catalog\CatalogFactory getFactory()
 */
class CatalogSearchConfigBuilder extends AbstractPlugin implements SearchConfigBuilderInterface
{

    const DEFAULT_ITEMS_PER_PAGE = 12;
    const VALID_ITEMS_PER_PAGE_OPTIONS = [12, 24, 36];
    const SIZE_UNLIMITED = 0;

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return void
     */
    public function buildFacetConfig(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $this
            ->addCategoryFacet($facetConfigBuilder)
            ->addPriceFacet($facetConfigBuilder);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return void
     */
    public function buildSortConfig(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $this
            ->addAscendingNameSort($sortConfigBuilder)
            ->addDescendingNameSort($sortConfigBuilder)
            ->addAscendingPriceSort($sortConfigBuilder)
            ->addDescendingPriceSort($sortConfigBuilder);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\PaginationConfigBuilderInterface $paginationConfigBuilder
     *
     * @return void
     */
    public function buildPaginationConfig(PaginationConfigBuilderInterface $paginationConfigBuilder)
    {
        $paginationConfigTransfer = (new PaginationConfigTransfer())
            ->setParameterName('page')
            ->setItemsPerPageParameterName('ipp')
            ->setDefaultItemsPerPage(self::DEFAULT_ITEMS_PER_PAGE)
            ->setValidItemsPerPageOptions(self::VALID_ITEMS_PER_PAGE_OPTIONS);

        $paginationConfigBuilder->setPagination($paginationConfigTransfer);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addCategoryFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $categoryFacet = (new FacetConfigTransfer())
            ->setName('category')
            ->setParameterName('category')
            ->setFieldName(PageIndexMap::CATEGORY_ALL_PARENTS)
            ->setType(SearchConfig::FACET_TYPE_CATEGORY)
            ->setSize(self::SIZE_UNLIMITED);

        $facetConfigBuilder->addFacet($categoryFacet);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addPriceFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $priceFacet = (new FacetConfigTransfer())
            ->setName('price')
            ->setParameterName('price')
            ->setFieldName(PageIndexMap::INTEGER_FACET)
            ->setType(SearchConfig::FACET_TYPE_PRICE_RANGE);

        $facetConfigBuilder->addFacet($priceFacet);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addAscendingNameSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $ascendingNameSortConfig = (new SortConfigTransfer())
            ->setName('name')
            ->setParameterName('name_asc')
            ->setFieldName(PageIndexMap::STRING_SORT);

        $sortConfigBuilder->addSort($ascendingNameSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addDescendingNameSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $ascendingNameSortConfig = (new SortConfigTransfer())
            ->setName('name')
            ->setParameterName('name_desc')
            ->setFieldName(PageIndexMap::STRING_SORT)
            ->setIsDescending(true);

        $sortConfigBuilder->addSort($ascendingNameSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addAscendingPriceSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $priceSortConfig = (new SortConfigTransfer())
            ->setName('price')
            ->setParameterName('price_asc')
            ->setFieldName(PageIndexMap::INTEGER_SORT);

        $sortConfigBuilder->addSort($priceSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addDescendingPriceSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $priceSortConfig = (new SortConfigTransfer())
            ->setName('price')
            ->setParameterName('price_desc')
            ->setFieldName(PageIndexMap::INTEGER_SORT)
            ->setIsDescending(true);

        $sortConfigBuilder->addSort($priceSortConfig);

        return $this;
    }

}
