<?php

namespace interfaces;

interface ApiActionInterface
{
    /**
     * Основное действие api
     *
     * @param array $restData
     * @return void
     */
    public function doApiAction(array $restData);
}