<?php 

if(is_front_page()){
	get_template_part('headers/homepage');
} else {
	get_template_part('headers/common');
}