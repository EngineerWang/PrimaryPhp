<style>
	table{
		border: 1px solid red;
		margin: 0 auto;
	}
	.weekday{
		width: 30px;
		height: 30px;
		background-color: blue;
	}
	td{
		width: 30px;
		height: 30px;
		text-align: center;
		font-weight: bold;
	}
	.nowday{
		background-color: blue;
	}
</style>
<?php
	class Calendar{
		private $year;
		private $month;
		private $day;
		private $monthdays;
		private $weekday;
		public function __construct(){
			$this->year = $_GET['year']?$_GET['year']:date('Y');
			$this->month = $_GET['month']?$_GET['month']:date('m');
			$this->day = date('j');
			$this->monthdays = date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
			$this->weekday = date('w', mktime(0, 0, 0, $this->month, 1, $this->year));
		}
		public function out(){
			echo "<table>";
			$this->head();
			$this->weekList();
			$this->dayList();
			echo "</table>";
		}
		public function prevyear($year, $month){
			if($year > 1970){
				$year = $year - 1;
			}
			return "year=".$year."&month=".$month;
		}
		public function nextyear($year, $month){
			if($year < 2038){
				$year = $year + 1;
			}
			return "year=".$year."&month=".$month;
		}
		public function prevmonth($year, $month){
			if($month == 1){
				if($year >= 1971){
					$month = 12;
					$year = $year - 1;
				}
			}else{
				$month = $month - 1;
			}
			return "year=".$year."&month=".$month;
		}
		public function nextmonth($year, $month){
			if($month == 12){
				if($year <= 2037){
					$month = 1;
					$year = $year + 1;
				}
			}else{
				$month = $month + 1;
			}
			return "year=".$year."&month=".$month;
		}
		public function head(){
			echo "<tr>";
			echo "<td><a href=?".$this->prevyear($this->year, $this->month)."><<</a></td>";
			echo "<td><a href=?".$this->prevmonth($this->year, $this->month)."><</a></td>";
			echo "<td colspan='3'>".$this->year."年".$this->month."月"."</td>";
			echo "<td><a href=?".$this->nextmonth($this->year, $this->month).">></a></td>";
			echo "<td><a href=?".$this->nextyear($this->year, $this->month).">>></a></td>"; 
			echo "</tr>";
		}
		public function weekList(){
			$arr = array('日', '一', '二', '三', '四', '五', '六');
			echo "<tr>";
			foreach($arr as $v){
				echo "<th class='weekday'>".$v."</th>";
			}
			echo "</tr>";
		}
		public function dayList(){
			echo "<tr>";
			for($i=0; $i<$this->weekday; $i++){
				echo "<td>&nbsp;</td>";
			}
			for($j=1; $j<=$this->monthdays; $j++){
				$i++;
				if($j == $this->day){
					echo "<td class='nowday'>".$j."</td>";
				}else{
					echo "<td>".$j."</td>";
				}
				if($i%7 == 0){
					echo "</tr><tr>";
				}
			}
			echo "</tr>";
		}
	}
	
?>