<?php
class ShortPaginator {
	public $total_rows;
	public $total_pages;
	public $rows_each_page;

	public $class_name;
	public $current_page;

	public $start;
	public $end;

	public function __construct($total_rows, $rows_each_page, $current_page) {
		$this->total_rows = $total_rows;

		$this->rows_each_page = $rows_each_page;

		$this->total_pages = ceil($this->total_rows / $this->rows_each_page);

		$this->current_page = $current_page;

		if($current_page > $total_rows) {
			$current_page = $total_rows; 
		} 

		if($this->current_page > $this->total_pages) {
			echo 'Данной страницы не существует!'; exit;
		}
	}


	public function getNav() {
		$f=($this->current_page != 1) ? 'active_link' : 'inactive_link'; 
		echo '<a href="/games/main?num=1" class="'.$f.'">First</a>';

		if($this->total_pages <= 5) {
			$start = 1;
			$end   = $this->total_pages;
		} elseif($this->current_page-2 > 1 && $this->current_page+2 < $this->total_pages) {
			$start = $this->current_page-2;
			$end   = $this->current_page+2;
		} elseif($this->current_page-2 <= 1 && $this->current_page+2 != $this->total_pages) {
			$start = 1;
			$end   = $start + 4;
		} else {
			$start = $this->total_pages - 4;
			$end   = $this->total_pages;
		}

		for($i=$start; $i <= $end; $i++) { 
			if($this->current_page == $i) {
				$class='inactive_link';
			} else {
				$class='active_link';
			}
			echo '<a href="/games/main?num='.$i.'" class="'.$class.'">'.$i.'</a>';
		}

		$l=($this->current_page != $this->total_pages) ? 'active_link' : 'inactive_link';
		echo '<a href="/games/main?num='.$this->total_pages.'" class="'.$l.'" >Last</a>';
	}
} 
