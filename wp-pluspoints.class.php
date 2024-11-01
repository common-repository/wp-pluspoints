<?php
/* Class that manages all the features of Your PointsPlus plugin */
class WP_PlusPoints {
	/*
	 * Calculate points
	 *
	 * @param in $servings
	 * @param float $protein
	 * @param float $carbs
	 * @param float $fat
	 * @param float $fiber
	 * @return string
	 */
	function getPoints($servings, $protein, $carbs, $fat, $fiber) {
		global $id;
		$points = max( round( $servings * ( ($fat*(9/35)) + ($carbs*(19/175)) + ($protein*(16/175)) - ($fiber*(2/25)) ) ), 0);
		$html = '<span class="plusPoints" title="Protein: '.($servings*$protein).'grams, Carbohydrates: '.($servings*$carbs).'grams, Fat :'.($servings*$fat).'grams, Fiber: '.($servings*$fiber).'grams">[<strong rel="'.$id.'">' . $points .'</strong> Points]</span>';
		
		return $html;
	}
	function getPostWPPPTotals($daily_total) {
		global $id;
		$html = '<div class="wppp_total" title="'.$daily_total.'" rel="'.$id.'">';
		if(get_option('wppp_credits')) {
			$html .= '<div class="WPPP_credits">powered by <a href="http://www.dingobytes.com/wordpress/wordpress-plus-points" title="Your PointsPlus" rel="wppp_external">Your PointsPlus</a></div>';
		}
		else {
			$html .= '<!-- powered by Your PointsPlus - http://dingobytes.com/ -->';
		}
		$html .= '</div>';
		return $html;
	}
}