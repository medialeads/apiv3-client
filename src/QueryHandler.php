<?php

namespace Medialeads\Apiv3Client;

class QueryHandler
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perpage;

    /**
     * @var string
     */
    private $sortField;

    /**
     * @var string
     */
    private $sortDirection;

    /**
     * @var bool
     */
    private $oneVariant;

    /**
     * @var array
     */
    private $searchHandlers;

    public function __construct($language)
    {
        $this->searchHandlers = [];
        $this->page = 1;
        $this->perpage = 10;
        $this->sortField = 'relevance';
        $this->sortDirection = 'desc';
        $this->oneVariant = false;
    }

    /**
     * @return array
     */
    public function export()
    {
        $searchExports = [];
        foreach ($this->searchHandlers as $searchHandler) {
            $searchExports[] = $searchHandler->export();
        }

        return [
            'search_handlers' => $searchExports,
            'lang' => $this->language,
            'page' => $this->page,
            'limit' => $this->perpage,
            'sort_field' => $this->sortField,
            'sort_direction' => $this->sortDirection,
            'one_variant' => $this->oneVariant
        ];
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return QueryHandler
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerpage()
    {
        return $this->perpage;
    }

    /**
     * @param int $perpage
     *
     * @return QueryHandler
     */
    public function setPerpage($perpage)
    {
        $this->perpage = $perpage;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortField()
    {
        return $this->sortField;
    }

    /**
     * @param string $sortField
     *
     * @return QueryHandler
     */
    public function setSortField($sortField)
    {
        $this->sortField = $sortField;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortDirection()
    {
        return $this->sortDirection;
    }

    /**
     * @param string $sortDirection
     *
     * @return QueryHandler
     */
    public function setSortDirection($sortDirection)
    {
        $this->sortDirection = $sortDirection;

        return $this;
    }

    /**
     * @return array
     */
    public function getSearchHandlers()
    {
        return $this->searchHandlers;
    }

    /**
     * @param array $searchHandlers
     *
     * @return QueryHandler
     */
    public function setSearchHandlers($searchHandlers)
    {
        $this->searchHandlers = $searchHandlers;

        return $this;
    }

    /**
     * @param SearchHandler $searchHandler
     *
     * @return QueryHandler
     */
    public function addSearchHandler(SearchHandler $searchHandler)
    {
        $this->searchHandlers[] = $searchHandler;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOneVariant(): bool
    {
        return $this->oneVariant;
    }

    /**
     * @param bool $oneVariant
     *
     * @return QueryHandler
     */
    public function setOneVariant(bool $oneVariant): QueryHandler
    {
        $this->oneVariant = $oneVariant;

        return $this;
    }
}