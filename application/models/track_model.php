<?php
class Track_model extends CI_Model {

    function __construct()
    {
    	$this->load->database();
        parent::__construct();
        date_default_timezone_set('America/Chicago');
    }
    function add_record($user_id, $postdata)
    {
        $input = array(
            'user_id'=>$user_id,
            'location'=>$postdata['location'],
            'gas_price'=>$postdata['gas_price'],
            'mileage'=>$postdata['mileage'],
            'num_gallons'=>$postdata['num_gallons'],
            'notes'=>$postdata['notes'],
            'date'=>date("Y-m-d H:i:s"));

            $this->db->insert('tracking', $input);
    }
    function get($track_id)
    {
        return $this->db->get_where('tracking', array('track_id' => $track_id))->row_array();
    }
    function get_all($user_id = NULL)
    {
        if($user_id){
             $this->db->from('tracking');
             $this->db->where('user_id', $user_id);
             $this->db->order_by("track_id", "desc"); 
            return $this->db->get()->result_array();
        }
        else{
            return $this->db->get('tracking')->result_array();
        }
    }
    function update_record($track_id, $postdata)
    {
        $input = array(
            'location'=>$postdata['location'],
            'gas_price'=>$postdata['gas_price'],
            'mileage'=>$postdata['mileage'],
            'num_gallons'=>$postdata['num_gallons'],
            'notes'=>$postdata['notes']);
        $this->db->where('track_id', $track_id);
        $this->db->update('tracking', $input); 
    }
    function delete_record($id)
    {
        $this->db->where('track_id', $id);
        $this->db->delete('tracking'); 
    }
    function get_count($user_id = NULL){

        if($user_id){
            $this->db->from('tracking');
            $this->db->where('user_id', $user_id);

            return $this->db->count_all_results();
        }
        else{
            return $this->db->count_all_results('tracking');
        }
    }
    function user_report($user_id)
    {
        $report = array();
        $this->db->select_avg('gas_price');
        $report['average_price'] = $this->db->get('tracking') -> row_array();
        $this->db->select_sum('num_gallons');
        $report['total_gallons'] = $this->db->get('tracking') -> row_array();
        $report['total_paid'] = $this->db->query('SELECT track_id, sum(num_gallons * gas_price) as "price_paid" from tracking') -> row_array();
        $this->db->select_min('mileage');
        $min = $this->db->get('tracking') -> row_array();
        $this->db->select_max('mileage');
        $max = $this->db->get('tracking') -> row_array();
        $report['mileage']=$max['mileage']-$min['mileage'];
        return $report;
    }

    function get_prices($user_id)
    {
        $this->db->select('date, gas_price, location');
        $this->db->from('tracking');
        $this->db->where('user_id', $user_id);
        $this->db->order_by("date", "asc"); 
        return  $this->db->get()->result_array();   
    }
}