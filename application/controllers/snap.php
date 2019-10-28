<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		https://example.com/index.php/welcome
	 *	- or -  
	 * 		https://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at https://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function Snap() {
        parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-7x3cEizPAPkne23dT0TQQaRl', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }


    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		
		// Required
		$transaction_details = array(
		  'order_id' => 1232222112222,
		  'gross_amount' => 3000000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'DR-1-18-00357',
		  'price' => 1000000,
		  'quantity' => 1,
		  'name' => "Pave Diamond Ring"
		);

		// Optional
		$item2_details = array(
		  'id' => 'FCDR-15-0000030',
		  'price' => 1000000,
		  'quantity' => 2,
		  'name' => "2.05 FY OV WG 750 R GIA"
		);

		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Rudy",
		  'last_name'     => "Hartanto",
		  'address'       => "Jln. Masjid",
		  'city'          => "Jakarta",
		  'postal_code'   => "13750",
		  'phone'         => "085694522356",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Rudy",
		  'last_name'     => "Hartanto",
		  'address'       => "Jln. Masjid",
		  'city'          => "Jakarta",
		  'postal_code'   => "13750",
		  'phone'         => "085694522356",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "Rudy",
		  'last_name'     => "Hartanto",
		  'email'         => "rudyhartanto84@gmail.com",
		  'phone'         => "085694522356",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }
}
