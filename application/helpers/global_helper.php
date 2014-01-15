<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pushSuccess($text)
{
	$ci = & get_instance();
	$ci->session->set_userdata('success', $text);
}
function getSuccess()
{
	$ci = & get_instance();
	$output = $ci->session->userdata('success');
	$ci->session->unset_userdata('success');
	return $output;
}
function pushError($text)
{
	$ci = & get_instance();
	$ci->session->set_userdata('error', $text);
}
function getError()
{
	$ci = & get_instance();
	$output = $ci->session->userdata('error');
	$ci->session->unset_userdata('error');
	return $output;
}