<?php

namespace application\lib;

class Pagination {
    
    private $max = 10;
    private $route;
    private $index = '';
    private $current_page;
    private $total;
    private $limit;
    private $amount;
    public function __construct($route, $total, $limit = 10) {
        $this->route = $route;
        $this->total = $total;
        $this->limit = $limit;
        $this->amount = $this->calculateAmount();
        $this->setCurrentPage();
    }
    public function get() {
        $links = null;
        $limits = $this->calculateLimits();
        $html = '<nav><ul class="pagination">';
        
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            $links .= $this->generateHtml($page);
        }

        if (!is_null($links)) {
            if ($this->current_page > 1) {
                $links = $this->generateHtml(1, 'Вперед') . $links;
            }
            if ($this->current_page < $this->amount) {
                $links .= $this->generateHtml($this->amount, 'Назад');
            }
        }

        $html .= $links . ' </ul></nav>';
        return $html;
    }
    private function generateHtml($page, $text = null) {
        $text = $text ?: $page;
        $url = sprintf('/%s/%s/%d', $this->route['controller'], $this->route['action'], $page);
        return sprintf('<li class="page-item"><a class="page-link" href="%s">%s</a></li>', $url, $text);
    }

    private function calculateLimits() {
        $left = $this->current_page - round($this->max / 2);
        $start = max($left, 1);
        
        $end = min($start + $this->max - 1, $this->amount);
        if ($start + $this->max <= $this->amount) {
            $end = $start + $this->max;
        } else {
            $start = max($this->amount - $this->max + 1, 1);
            $end = $this->amount;
        }

        return [$start, $end];
    }

    private function setCurrentPage() {
        $currentPage = $this->route['page'] ?? 1;
        $this->current_page = max(1, min($currentPage, $this->amount));
    }

    private function calculateAmount() {
        return ceil($this->total / $this->limit);
    }
}