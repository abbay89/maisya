<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    public function Product() {
        parent::__construct();
		$this->load->model("user_model");
		$this->load->model("product_model");
		$this->load->model("home_model");
		$this->load->model("checkout_model"); 
		$this->load->model("admin_model"); 
		$this->loadJS = array (		
			'/assets/js/skdslider.min.js',
			'/assets/js/jquery-ui-1.9.2.custom.min.js',
			'/assets/js/multiaccordion.jquery.js',
			'/assets/js/jquery.simplePagination.js',
			'/assets/js/jquery.elevatezoom.js',
			'/assets/js/tagInput.js',
			
			'/assets/js/slick.min.js');
			
		$this->loadCSS = array(
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'/assets/css/simplePagination.css',
			'/assets/css/pretty-checkbox.min.css',			
			'/assets/css/bootstrap.min.css',		
			
			'assets/css/style.css',
			'/assets/css/multiaccordion.jquery.css'
		);
    }
	
	public function index($term = ''){
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		//echo "masuk".$term;
		//if($term == '')
		//{
			
				$_term		= '';
				$termnya = '';
			
			
		//}
		/* else
		{
			$_term	= str_replace(" ","%20",$term);
			$termnya	= $term;
		} */
		if($_GET['page']){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		
		
		$url =  "https://www.maisya.id:5060/api/products/21/".$page."/productID?searchText=".$_term;
		//echo $url;exit;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		$datajson = json_decode($result);
		$customers	= $datajson->ProductList;
	
		//echo var_dump($customers);exit;
		//masterfilter
		$data['filterprice'] = $this->product_model->getfilter('PRICE');
		$data['filtergender'] = $this->product_model->getfilter('GENDER');
		$data['filtermetal'] = $this->product_model->getfilter('METAL TYPE');
		$data['filtershape'] = $this->product_model->getfilter('SHAPE');
		$data['filterstone'] = $this->product_model->getfilter('STONE TYPE');
		$data['detail_prod'] 	= $customers;
		$data['count_product'] 	= $datajson;
		
		$data['titlepage']			= 	"/ Keyword / ".$_POST['searchtext'];
		$data['title_page']			= 	$data['detail_prod']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['description_page']	=   $data['detail_prod']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['keyword_page']		=   $data['detail_prod']->ProductName.",maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	$data['detail_prod']->ProductName;
		$data['ogdesc_page']		= 	"Collection Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_prod']->ProductID."&width=200px&height=200px";
		$data['img_page']			= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_prod']->ProductID."&width=200&height=200";
		
		$data['pagingny'] 			= $this->createPagingSearch($term,$_GET['page'],$datajson->totalPages);
		
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$data['keySearch'] 			=   $_term;
		
		$this->load->view('search_product', $data);
		
	}
	
    public function discount($disc,$page=1) {
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		//$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?disc='.$disc));
		
		
		if($_POST['shape'])
		{
			$shape 			= implode(";",$_POST['shape']);
			$filterdesc[]	= implode(",",$_POST['shape']);
		}
		if($_POST['unitprice'])
		{
			$unitprice 		= implode(";",$_POST['unitprice']);
			$filterdesc[]	= implode(",",$_POST['unitprice']);
		}
		if($_POST['gender'])
		{
			$gender 		= implode(";",$_POST['gender']);
			$filterdesc[]	= implode(",",$_POST['gender']);
		}
		if($_POST['metal'])
		{
			$metal 			= implode(";",$_POST['metal']);
			$filterdesc[]	= implode(",",$_POST['metal']);
		}
		if($_POST['stoneshape'])
		{
			$stoneshape 	= implode(";",str_replace('RBY','RB',$_POST['stoneshape']));
			$filterdesc[]	= implode(",",$_POST['stoneshape']);
		}
		
		//$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/categoryid?tag=ring'));
		if($unitprice == '')
		{
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?disc='.$disc.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		else
		{
			
			$pos	= strpos($unitprice, ";");
			if ($pos === false) 
			{
				$price 		= explode("-",$unitprice);
				$fminprice	= str_replace("k","000",str_replace("m","000000",$price[0]));
				$fmaxPrice	= str_replace("k","000",str_replace("m","000000",$price[1]));
			}
			else
			{
				$price 		= explode(";",$unitprice);
				for($i = 0;$i <= count($price) - 1; $i++)
				{
					$newprice 	= explode("-",$price[$i]);
					$minprice[]	= str_replace("k","000",str_replace("m","000000",$newprice[0]));
					$maxPrice[]	= str_replace("k","000",str_replace("m","000000",$newprice[1]));
					
					$fminprice = implode(";",$minprice);
					$fmaxPrice = implode(";",$maxPrice);
				}
				//exit;
			}
			
			//exit;
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?disc='.$disc.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		
		$customers	= $datajson->ProductList;
		
		$data['detail_prod'] 	= $customers;
		$data['count_product'] 	= $datajson;
		$data['titlepage'] 		= $title;
		$data['category'] 		= $tag;
		$data['type'] 			= $subtag;
		$data['sortby'] 		= 'ProductId';

		$data['cate'] 		= "Promo Discount ".($disc==50 ? 'lebih dari':'')." ".$disc.($disc!='' ? '%':'');
		$data['title_page']			= 	"Promo Discount ".($disc==50 ? 'lebih dari':'')." ".$disc.($disc!='' ? '%':'');
		
		$data['controller']		= $this; 
		$sql_f  	= implode("','",str_replace(",","','",$filterdesc));
		//print_r($filterdesc);
		//echo $sql_f;
		$sqldata	= "select nameFilter from masterfilter where kodeFilter in ('".$sql_f."')";
		//echo $sqldata;
		$rowdata	= $this->db->query($sqldata)->result_array();
		foreach($rowdata as $lsData)
		{
			$name[] = $lsData['nameFilter'];
		}
		//print_r($name);
		$data['resultfilter']	= implode(",",$name);
		$data['validatefilter']	= implode(",",$filterdesc);
		//exit;
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		
		//wishlist
		$data['totalwhs']	= $this->checkWishlist($this->session->userdata('cust_username'));
		
		//masterfilter
		$data['filterprice'] = $this->product_model->getfilter('PRICE');
		$data['filtergender'] = $this->product_model->getfilter('GENDER');
		$data['filtermetal'] = $this->product_model->getfilter('METAL TYPE');
		$data['filtershape'] = $this->product_model->getfilter('SHAPE');
		$data['filterstone'] = $this->product_model->getfilter('STONE TYPE');
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['category']			= 'all';
		$data['footer']			= $footer;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('list_product', $data);
	}
	public function createPagingSearch($term,$page,$totalpage)
	{	
		
		//https://www.maisya.id:5060/api/products/22/1/productID?searchText=".$_term
		$targetpage = base_url()."product/search/".str_replace(' ','-',$term)."/";
		$pagination = "";
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;	
		$total_pages = $totalpage;
		$lastpage = ceil($total_pages);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		$adjacents = 3;
		
		
		
		if($lastpage > 1)
		{	
			//echo $lastpage."masuk";
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev\">Prev</a>";
			else
				$pagination.= "<span class=\"disabled\">Prev</span>";	
			
			//pages	
			if ($lastpage < 4 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 2 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
			else
				$pagination.= "<span class=\"disabled\">Next </span>";
			$pagination.= "</div>\n";		
		}
		//echo $pagination;
		return $pagination;
	}
	public function createPaging($cate,$type,$page,$totalpage)
	{
		
		$targetpage = "#";
		$pagination = "";
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;	
		$total_pages = $totalpage;
		$lastpage = ceil($total_pages);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		$adjacents = 3;
		
		
		
		if($lastpage > 1)
		{	
			//echo $lastpage."masuk";
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev\">Prev</a>";
			else
				$pagination.= "<span class=\"disabled\">Prev</span>";	
			
			//pages	
			if ($lastpage < 4 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage\" class=\"paging\" data-page=\"$counter\">
							<input type=\"hidden\" class=\"value\" value=\"$counter\" />
							$counter
						</a>";					
				}
			}
			elseif($lastpage > 2 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage\" class=\"paging\"  data-page=\"$counter\"> 
							<input type=\"hidden\" class=\"value\" value=\"$counter\" />
							$counter
						</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage\" class=\"paging\"  data-page=\"$counter\">
							<input type=\"hidden\" class=\"value\" value=\"$counter\" />
							$counter
						</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage\" class=\"paging\">
							<input type=\"hidden\" class=\"value\" value=\"$counter\" />
							$counter
						</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
			else
				$pagination.= "<span class=\"disabled\">Next </span>";
			$pagination.= "</div>\n";		
		}
		//echo $pagination;
		return $pagination;
	}
	
	
	public function createPaging_old($cate,$type,$page,$totalpage,$post = array())
	{
		
		$targetpage = base_url()."category/".$cate."/type/".$type;
		$pagination = "";
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;	
		$total_pages = $totalpage;
		$lastpage = ceil($total_pages);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		$adjacents = 3;
		$datafind 	= urlencode(json_encode($post));
		
		
		if($lastpage > 1)
		{	
			//echo $lastpage."masuk";
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev&search=$datafind\">Prev</a>";
			else
				$pagination.= "<span class=\"disabled\">Prev</span>";	
			
			//pages	
			if ($lastpage < 4 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&search=$datafind\">$counter</a>";					
				}
			}
			elseif($lastpage > 2 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter&search=$datafind\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1&search=$datafind\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage&search=$datafind\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1&search=$datafind\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2&search=$datafind\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter&search=$datafind\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1&search=$datafind\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage&search=$datafind\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1&search=$datafind\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2&search=$datafind\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter&search=$datafind\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next&search=$datafind\">Next</a>";
			else
				$pagination.= "<span class=\"disabled\">Next </span>";
			$pagination.= "</div>\n";		
		}
		//echo $pagination;
		return $pagination;
	}
	
	public function category($cate,$type,$title='',$page=1,$unitprice='') {
		$data['loadjs']				= 	$this->loadJS; 		
		$data['loadCss']			= 	$this->loadCSS;
		if($_POST['page'] >= 1)
		{
			$page = $_POST['page'];
		}else{
			$page = 1;
		}
		
		$data['page'] 		= $page;
		$data['pagingdt'] 	= $page;
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		//echo $cate."===>".$type."==>".$page;
		//echo json_encode($this->getDataFromServer('/api/products/24/1/CategoryID'));
		$data['cate_prod'] 		= $cate;
		$data['type_prod'] 		= $type;
		
		//$data['parampaging']	= $page;
		
		if($cate == 'cincin')
		{
			$tag 	= 'ring';	
			$title	= '<li >Rings </li><li class="active">All Rings</li>';
		}
		else if($cate == 'anting')
		{
			$tag 	= 'earring';	
			$title	= '<li >Earrings </li><li class="active">All Earrings</li>';
		}
		else if($cate == 'gelang')
		{
			$tag 	= 'bracelet';	
			$title	= '<li >Bracelet </li><li class="active">All Bracelet</li>';
		}
		else if($cate == 'batu-permata')
		{
			$tag 	= 'gemstone';	
			$title	= '<li >Gemstone </li><li class="active">All Gemstone</li>';
		}
		else if($cate == 'liontin')
		{
			$tag 	= 'pendant';	
			$title	= '<li >Pendant </li><li class="active">All Pendant</li>';
		}
		else if($cate == 'perhiasan-emas')
		{
			$tag 	= 'jewellery';	
			$title	= '<li >Jewellery </li><li class="active">All Jewellery</li>';
		}
		
		if($type == 'all')
		{
			$subtag = '';				
		}
		else
		{
			if($type == 'womens')
			{
				$tag2 	= 'women';	
				$subtag = 'women';
			}
			else if($type == 'studearrings')
			{
				$tag2 	= 'stud earrings';	
				$subtag = 'stud';
			}
			else
			{
				$tag2 	= $type;
				
				switch($type){
					case 'cincin' :
						$subtag 	= 'ring';
					break;
					case 'anting' :
						$subtag 	= 'earring';
					break;
					case 'gelang' :
						$subtag 	= 'bracelet';
					break;
					case 'batu-permata' :
						$subtag 	= 'gemstone';
					break;
					case 'liontin' :
						$subtag 	= 'pendant';
					break;
					case 'perhiasan-emas' :
						$subtag 	= 'jewellery';
					break;
					default:
						$subtag = $type;
					break;
				}
				
				//$subtag = $type;
			}
				
		}
		
	
		if($_POST['shape'])
		{
			$shape 			= implode(";",$_POST['shape']);
			$filterdesc[]	= implode(",",$_POST['shape']);
		}
		if($_POST['unitprice'])
		{
			$unitprice 		= implode(";",$_POST['unitprice']);
			$filterdesc[]	= implode(",",$_POST['unitprice']);
		}
		if($_POST['gender'])
		{
			$gender 		= implode(";",$_POST['gender']);
			$filterdesc[]	= implode(",",$_POST['gender']);
		}
		if($_POST['metal'])
		{
			$metal 			= implode(";",$_POST['metal']);
			$filterdesc[]	= implode(",",$_POST['metal']);
		}
		if($_POST['stoneshape'])
		{
			$stoneshape 	= implode(";",str_replace('RBY','RB',$_POST['stoneshape']));
			$filterdesc[]	= implode(",",$_POST['stoneshape']);
		}
		
		//$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/categoryid?tag=ring'));
		
		switch($subtag){
			case "berlian-fancy":
				$subtag = "fancy_colored_diamond";
			break;
			case "berlian":
				$subtag = "diamond";
			break;
			case "emas":
				$subtag = "gold";
			break;
			case "mutiara":
				$subtag = "pearl";
			break;
			case "perak":
				$subtag = "silver";
			break;
			case "kalung-fancy":
				$subtag = "colorstonejew";
			break;
			case "kalung-berlian":
				$subtag = "diamond_jewellery";
			break;
			case "kalung-mutiara":
				$subtag = "pearljew";
			break;
			case "kalung-nikah":
				$subtag = "all";
			break;
			
			
			
		}
		
		if($unitprice == '')
		{
			/* echo '/api/products/24/'.$page.'/Productid?tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fromprice.'&maxPrice='.$toprice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape;
			exit; */
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fromprice.'&maxPrice='.$toprice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
			//echo json_encode($datajson->ProductList);exit;
			

		}
		else
		{
			
			$pos	= strpos($unitprice, ";");
			if ($pos === false) 
			{
				$price 		= explode("-",$unitprice);
				$fminprice	= str_replace("k","000",str_replace("m","000000",$price[0]));
				$fmaxPrice	= str_replace("k","000",str_replace("m","000000",$price[1]));
			}
			else
			{
				$price 		= explode(";",$unitprice);
				for($i = 0;$i <= count($price) - 1; $i++)
				{
					$newprice 	= explode("-",$price[$i]);
					$minprice[]	= str_replace("k","000",str_replace("m","000000",$newprice[0]));
					$maxPrice[]	= str_replace("k","000",str_replace("m","000000",$newprice[1]));
					
					$fminprice = implode(";",$minprice);
					$fmaxPrice = implode(";",$maxPrice);
				}
				//exit;
			}
			
			//exit;
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid??tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
			
			
		}
		
		
		if($type != 'cincin-nikah'){
			$customers	= $datajson->ProductList;
		}else{
			$datajson	= json_decode($this->getDataFromServer('/api/cincingrups/50/1/?Desc=True'));
			//echo json_encode($datajson);exit;
			$customers	= $datajson->CincinGrupList;
			//$customers	= $this->admin_model->getWedding();
		}
		//print_r($customers);exit;
		
		$data['detail_prod'] 	= $customers;
		$data['count_product'] 	= $datajson;
		$data['titlepage'] 		= $title;
		$data['category'] 		= $tag;
		$data['type'] 			= $type;
		$data['sortby'] 		= 'ProductId';
		
		switch($subtag){
			case "fancy_colored_diamond":
				$sub = 'berlian fancy';
			break;
			case "diamond":
				$sub = 'berlian';
			break;
			case "gemstone":
				$sub = 'batu permata';
			break;
			case "gold":
				$sub = 'emas';
			break;
			case "pearl":
				$sub = 'mutiara';
			break;
			case "silver":
				$sub = 'perak';
			break;
			
		}
		
		
		
		$data['cate'] 		= str_replace('-',' ',$cate." ".$sub);
		
		$data['title_page']			= 	(strtolower($tag)=='ring' ? 'Cincin':$tag)." ".ucfirst($type) ." Maisya";
		$data['description_page']	=   $tag." ".$type ." Collection Maisya Jewellery Online Shop";
		$data['keyword_page']		=   str_replace(" ",",",$tag2).str_replace(" ",",",$tag).",maisya,jewellery,maisya jewellery,indonesia";
		$data['ogtitle_page']		= 	$tag ." Collection Maisya Jewellery Online Shop";
		//$data['ogtimg_page']		= 	"https://www.maisya.id//assets/uploads/img_menu/30562-ringweb.jpg";
		//$data['img_page']			= 	"https://www.maisya.id//assets/uploads/img_menu/30562-ringweb.jpg";
		
		$data['controller']		= $this; 
		$sql_f  	= implode("','",str_replace(",","','",$filterdesc));
		//print_r($filterdesc);
		//echo $sql_f;
		$sqldata	= "select nameFilter from masterfilter where kodeFilter in ('".$sql_f."')";
		//echo $sqldata;
		$rowdata	= $this->db->query($sqldata)->result_array();
		foreach($rowdata as $lsData)
		{
			$name[] = $lsData['nameFilter'];
		}
		//print_r($name);
		$data['resultfilter']	= implode(",",$name);
		$data['validatefilter']	= implode(",",$filterdesc);
		//exit;
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		
		//wishlist
		$data['totalwhs']	= $this->checkWishlist($this->session->userdata('cust_username'));
		
		//masterfilter
		$data['filterprice'] = $this->product_model->getfilter('PRICE');
		$data['filtergender'] = $this->product_model->getfilter('GENDER');
		$data['filtermetal'] = $this->product_model->getfilter('METAL TYPE');
		$data['filtershape'] = $this->product_model->getfilter('SHAPE');
		$data['filterstone'] = $this->product_model->getfilter('STONE TYPE');
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		
		$data['pagingny'] = $this->createPaging($cate,$type,$_GET['page'],$datajson->totalPages,$_POST);
		
		if($type == 'all'){
			$currentURL = current_url();
			$uriArr = explode('/all', $currentURL);
			$canonicalUrl = $uriArr[0].'/all';
			// echo $canonicalUrl;
			$data['canonical'] = $canonicalUrl;
		}
		
		//echo  $this->createPaging($cate,$type,$page);exit;
		if($type != 'cincin-nikah'){
			$this->load->view('list_product', $data);
		}else{
			$this->load->view('list_product_wedding', $data);
		}
    }



	public function ajax_category($cate,$type,$page=1,$param='',$sortby='ProductID') {
		
		
		
		//echo $cate.' '.$type.' '.$page.' '.$param.' '.$sortBy;exit;
		if(empty($sortBy)){
			$sortBy = $param;
		}
	
		$desc = 'desc=false&';
		if (strpos($sortBy, '-') !== false) {
			$desc = 'desc=true&';
			$sortBy = str_replace("-","",$sortBy);
		}
		
		if($_GET['search'] != '[]'){
			if($type == 'all'){
				$type = '';
			}
			if($_POST['shape'])
			{
				$shape 			= implode(";",$_POST['shape']);
				$filterdesc[]	= implode(",",$_POST['shape']);
			}
			if($_POST['unitprice'])
			{
				$unitprice 		= implode(";",$_POST['unitprice']);
				$filterdesc[]	= implode(",",$_POST['unitprice']);
			}
			if($_POST['gender'])
			{
				$gender 		= implode(";",$_POST['gender']);
				$filterdesc[]	= implode(",",$_POST['gender']);
			}
			if($_POST['metal'])
			{
				$metal 			= implode(";",$_POST['metal']);
				$filterdesc[]	= implode(",",$_POST['metal']);
			}
			if($_POST['stoneshape'])
			{
				$stoneshape 	= implode(";",str_replace('RBY','RB',$_POST['stoneshape']));
				$filterdesc[]	= implode(",",$_POST['stoneshape']);
			}
		}else{
			
			$search = json_decode(urldecode($_GET['search']));
			
			
			echo $search;
			
			if($type == 'all'){
				$type = '';
			}
			if($search['shape'])
			{
				$shape 			= implode(";",$search['shape']);
				$filterdesc[]	= implode(",",$search['shape']);
			}
			if($search['unitprice'])
			{
				$unitprice 		= implode(";",$search['unitprice']);
				$filterdesc[]	= implode(",",$search['unitprice']);
			}
			if($search['gender'])
			{
				$gender 		= implode(";",$search['gender']);
				$filterdesc[]	= implode(",",$search['gender']);
			}
			if($search['metal'])
			{
				$metal 			= implode(";",$search['metal']);
				$filterdesc[]	= implode(",",$search['metal']);
			}
			if($search['stoneshape'])
			{
				$stoneshape 	= implode(";",str_replace('RBY','RB',$search['stoneshape']));
				$filterdesc[]	= implode(",",$search['stoneshape']);
			}			
		}
		//$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/categoryid?tag=ring'));
		if($unitprice == '')
		{
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/'.$sortBy.'?'.$desc.'tag='.$cate.'&subtag='.$type.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		else
		{
			//print_r($unitprice);
			$pos	= strpos($unitprice, ";");
			if ($pos === false) 
			{
				$price 		= explode("-",$unitprice);
				$fminprice	= str_replace("k","000",str_replace("m","000000",$price[0]));
				$fmaxPrice	= str_replace("k","000",str_replace("m","000000",$price[1]));
			}
			else
			{
				$price 		= explode(";",$unitprice);
				for($i = 0;$i <= count($price) - 1; $i++)
				{
					$newprice 	= explode("-",$price[$i]);
					$minprice[]	= str_replace("k","000",str_replace("m","000000",$newprice[0]));
					$maxPrice[]	= str_replace("k","000",str_replace("m","000000",$newprice[1]));
					
					$fminprice = implode(";",$minprice);
					$fmaxPrice = implode(";",$maxPrice);
				}
				//exit;
			}
			
			//exit;
		
			//echo 'descnya '.$desc;exit;
			$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/'.$sortBy.'?'.$desc.'tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		
		switch($type){
			case "berlian-fancy":
				$type = "fancy_colored_diamond";
			break;
			case "berlian":
				$type = "diamond";
			break;
			case "emas":
				$type = "gold";
			break;
			case "mutiara":
				$type = "pearl";
			break;
			case "perak":
				$type = "silver";
			break;
			case "kalung-fancy":
				$type = "colorstonejew";
			break;
			case "kalung-berlian":
				$type = "diamond_jewellery";
			break;
			case "kalung-mutiara":
				$type = "pearljew";
			break;
			case "kalung-nikah":
				$type = "all";
			break;
			
			
			
		}
		
		if($cate == 'empty'){
			$cate='';
		}
		
		if($type == 'empty'){
			$type= '';
		}
		
		//echo '/api/products/24/'.$page.'/'.$sortBy.'?'.$desc.'tag='.$cate.'&searchText='.urlencode($_GET['keyword']).'&subtag='.$type.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape;exit;
	    
		$datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/'.$sortBy.'?'.$desc.'tag='.$cate.'&searchText='.urlencode($_GET['keyword']).'&subtag='.$type.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
	
		$customers	= $datajson->ProductList;		

		foreach($customers as $listProduct)
		{
			$html .='<div class="col-xs-6 col-md-4 col-sm-4 lst-ctl">';
				
				$html .='<div class="thumbnail thumb-detail">';
					$html .='<div class="icon-wh">';
						$html .='<a href="#" id="wishlist">';
							$html .='<i class="far fa-heart"></i>';
						$html .='</a>';
					$html .='</div>';
					$html .='<a class="liprod" href="'.base_url().'detailproduct/'.$cate.'/'.str_replace(".","",str_replace(" ","-",$listProduct->ProductName)."--k--".$listProduct->ProductID).'">';
					
						$html .='<img src="https://www.maisya.id:5060/api/ProductImages?kodeitem='.$listProduct->ProductID.'&width=240&height=240" alt="resized image" class="img-thumbnail image" />';
							if (file_exists('https://www.maisya.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=10&height=10')) {
								$html .='<div class="overlay">
									<img src="https://www.maisya.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=240&height=240" class="img-thumbnail image">
								</div>';
							}
						
						$html .='<div class="caption">';
							$html .='<p class="title_p">'.$listProduct->ProductName.'</p>';
							$html .='<p class="sugestprice">
											IDR '.number_format($listProduct->SuggestPrice).'
										</p>';
							$html .='<p class="txtprice">';
								$html .='IDR '.number_format($listProduct->UnitPrice);
							$html .='</p>';
						$html .='</div>';
					$html .='</a>';
				$html .='</div>';
			$html .='</div>';
			
		}
		
		$html .= $this->createPaging($cate,$type,$page,$datajson->totalPages,$_POST);


			echo $html;
		exit;
    }
	public function detail($category = '' ,$id = 0) {
		
		// echo $this->uri->segment(2);echo "<br>";
		// echo $category;echo "<br>";
		// echo $id;
		// echo "<br>";exit;
		
		//print_r();
		
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		$dataid	= explode("--k--",$category);
		//print_r($dataid);exit;
		$data['detail_product']	= json_decode($this->getDetailProduct('/api/products/'.$dataid[1]));
		
		if(empty($data['detail_product'])){
			redirect("home");
		}
		// echo "<pre>";
		// print_r($data['detail_product']);
		// exit;
		
		$data['stoneinformation']		= $data['detail_product']->StoneInformations;
		
		
		
		$data['idproduct']		= $dataid[1];
		$dataallimg				= json_decode($this->getDetailProduct('/api/imageList?kodeitem='.$dataid[1]));
		
		$data['thumbimage']		= $dataallimg;
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		if($dataid[1] != 1){
			//$data['url'] = 'ProductImages2';
			$data['url'] = 'ProductImages';
		}
		else
		{
			$data['url'] = 'ProductImages';
		}
		//wishlist
		$data['totalwhs']	= $this->checkWishlist($this->session->userdata('cust_username'));
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		
		$data['title_page']			= 	$data['detail_product']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['description_page']	=   $data['detail_product']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['keyword_page']		=   str_replace(" ",",",$data['detail_product']->ProductName).",maisya,jewellery,maisya jewellery,indonesia,rudy,diamond";
		$data['ogtitle_page']		= 	$data['detail_product']->ProductName;
		$data['ogdesc_page']		= 	"Collection Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_product']->ProductID."&width=200px&height=200px";
		$data['img_page']			= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_product']->ProductID."&width=200px&height=200px";
		//$data['titlepage'] 			= 	$title;
		//print_r($data['detail_product']);exit;

		if( strtolower($this->uri->segment(2)) == 'all'){
			$data['title_page'] = 'All '.$data['title_page'];
		}

		$data['img_box']			= $this->uri->segment(2);
		$cat = explode('_',$dataid[0]);
		$data['category'] = $cat[0];
		$datajson	= json_decode($this->getDataFromServer('/api/products/24/1/Productid??tag='.$cat[0].'&subtag='.$cat[0]));
		$data['detail_prod'] 	= $datajson->ProductList;
		
        $this->load->view('detail_product', $data);
		
    }
	
	public function detailWedding($id){
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		$arrId = explode('-',$id);
		$idWedding = $arrId[2];
		
		$data['product'] = json_decode($this->getDetailProduct('/api/CincinGrup/'.$idWedding));
		$data['pria'] = $data['product']->CincinPriaList;
		$data['wanita'] = $data['product']->CincinWanitaList;
		//echo $data['pria'][0]->KodeItem;exit;
		$data['dataPria']	= json_decode($this->getDetailProduct('/api/products/'.$data['pria'][0]->KodeItem));
		$data['dataWanita']	= json_decode($this->getDetailProduct('/api/products/'.$data['wanita'][0]->KodeItem));
		
		
		
		$this->load->view('detail_product_wedding', $data);
		
	}
	
	public function detaildata($id) {
		$detail_product	= json_decode($this->getDetailProduct('/api/products/'.$id));
		
		return $detail_product;
    }
	public function search($term = ''){
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		//echo "masuk".$term;
		//if($term == '')
		//{
			if(isset($_POST['searchtext'])){
			$_term		= str_replace(" ","%20",$_POST['searchtext']);
			$termnya	= $_POST['searchtext'];
			}else{
				$_term		= str_replace("-","%20",$term);
				$termnya = str_replace("-"," ",$term);
			}
			
		//}
		/* else
		{
			$_term	= str_replace(" ","%20",$term);
			$termnya	= $term;
		} */
		if($_GET['page']){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		
		
		$url =  "https://www.maisya.id:5060/api/products/21/".$page."/productID?searchText=".$_term;
		//echo $url;exit;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		$datajson = json_decode($result);
		$customers	= $datajson->ProductList;
	
		//echo var_dump($customers);exit;
		//masterfilter
		$data['filterprice'] = $this->product_model->getfilter('PRICE');
		$data['filtergender'] = $this->product_model->getfilter('GENDER');
		$data['filtermetal'] = $this->product_model->getfilter('METAL TYPE');
		$data['filtershape'] = $this->product_model->getfilter('SHAPE');
		$data['filterstone'] = $this->product_model->getfilter('STONE TYPE');
		$data['detail_prod'] 	= $customers;
		$data['count_product'] 	= $datajson;
		
		$data['titlepage']			= 	"/ Keyword / ".$_POST['searchtext'];
		$data['title_page']			= 	$data['detail_prod']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['description_page']	=   $data['detail_prod']->ProductName ." Collection Maisya Jewellery Online Shop";
		$data['keyword_page']		=   $data['detail_prod']->ProductName.",maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	$data['detail_prod']->ProductName;
		$data['ogdesc_page']		= 	"Collection Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_prod']->ProductID."&width=200px&height=200px";
		$data['img_page']			= 	"https://www.maisya.id:5060/api/ProductImages?kodeitem=".$data['detail_prod']->ProductID."&width=200&height=200";
		
		$data['pagingny'] 			= $this->createPagingSearch($term,$_GET['page'],$datajson->totalPages);
		
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$data['keySearch'] 			=   $_term;
		
		$this->load->view('search_product', $data);
		
	}
	public function getDataFromServer($qry_str){
		$curl = curl_init($this->config->item('maisya_server').$qry_str);
		//echo $this->config->item('maisya_server').$qry_str;
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result; 
	}
	
	public function getDetailProduct($qry_str){
		//echo $this->config->item('maisya_server').$qry_str;
		$curl = curl_init($this->config->item('maisya_server').$qry_str);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result;
	}
	
	public function addcartwedding(){
		
		if(isset($_POST['productPria'])){
		$detail	= json_decode($this->getDetailProduct('/api/products/'.$_POST['productPria']));
		/*edit by rudy 20180814*/
		$cekCart = $this->db->query("select * from shopping_cart where id = '".$_POST['productPria']."' and user_id = '".$this->session->userdata('cust_username')."'")->row();
		if(empty($cekCart)){
			$data = array(
			'id'      => $detail->ProductID,
			'qty'     => 1,
			'price'   => $detail->UnitPrice,
			'name'    => $detail->ProductName,
			'weight_item'    => $detail->WeightGold,
			'user_id' => $this->session->userdata('cust_username'),
			'size_ring'    => $_POST['ukuranPria'],
			'size_price'    => $_POST['priceUkuranPria'],
			'grafier'    => $_POST['grafierPria']
			//'options' => array('Size' => 'L', 'Color' => 'Red')
			);
			if($this->session->userdata('cust_username'))
			{
				$this->db->insert('shopping_cart', $data);
			}
		}
		else{
			$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty + 1 where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$detail->ProductID."'");		
		}
		
		}
		
		if(isset($_POST['productWanita'])){
		$detail	= json_decode($this->getDetailProduct('/api/products/'.$_POST['productWanita']));
		/*edit by rudy 20180814*/
		$cekCart = $this->db->query("select * from shopping_cart where id = '".$detail->ProductID."' and user_id = '".$this->session->userdata('cust_username')."'")->row();
		if(empty($cekCart)){
			$data = array(
			'id'      => $detail->ProductID,
			'qty'     => 1,
			'price'   => $detail->UnitPrice,
			'name'    => $detail->ProductName,
			'weight_item'    => $detail->WeightGold,
			'user_id' => $this->session->userdata('cust_username'),
			'size_ring'    => $_POST['ukuranWanita'],
			'size_price'    => $_POST['priceUkuranWanita'],
			'grafier'    => $_POST['grafierWanita']
			//'options' => array('Size' => 'L', 'Color' => 'Red')
			);
			if($this->session->userdata('cust_username'))
			{
				$this->db->insert('shopping_cart', $data);
			}
		}
		else{
			$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty + 1 where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$detail->ProductID."'");		
		}
		
		}
		//$this->cart->insert($data);
		//redirect("checkout");
		echo '{"message":"success"}';exit;
		
	}
	
	
	public function addcart($id){
		$detail	= json_decode($this->getDetailProduct('/api/products/'.$id));;
		/*edit by rudy 20180814*/
		$cekCart = $this->db->query("select * from shopping_cart where id = '".$detail->ProductID."' and user_id = '".$this->session->userdata('cust_username')."'")->row();
		if(empty($cekCart)){
			$data = array(
			'id'      => $detail->ProductID,
			'qty'     => 1,
			'price'   => $detail->UnitPrice,
			'name'    => $detail->ProductName,
			'weight_item'    => $detail->WeightGold,
			'user_id' => $this->session->userdata('cust_username')
			//'options' => array('Size' => 'L', 'Color' => 'Red')
			);
			if($this->session->userdata('cust_username'))
			{
				$this->db->insert('shopping_cart', $data);
			}
		}
		else{
			$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty + 1 where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$detail->ProductID."'");		
		}
		//$this->cart->insert($data);
		redirect("checkout");
	}
	
	public function savewishlist(){
		//print_r($_POST);
		if($this->session->userdata('cust_username'))
		{
			$prodid 	= $_POST['idprod'];
			$userid		= $_POST['iduser'];
			$name		= $this->detaildata($prodid)->ProductName;
			
			//echo "insert into wishlist (userid,productid,productname) values ('".$userid."','".$prodid."','".$name."')";exit;
			
			$this->db->query("insert into wishlist (userid,productid,productname) values ('".$userid."','".$prodid."','".$name."')");
			//echo "insert into wishlist (userid,productid) values ('".$userid."','".$prodid."')";
			echo $this->checkWishlist($userid);
		}
		else
		{
			echo "error";
		}
		exit;
	}
	public function checkWishlist($userid){
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$userid."' limit 1 ")->row();
		return $wh->total;
	}
	
	function getCincin($page){
		 /*  echo 'testCronjob';
		  $this->user_model->insertLog('');exit; */
		  //echo 'test';exit;
		 $datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?desc=true&tag=ring'));
	    
		  
		  for($i=0;$i<count($datajson->ProductList);$i++){
			  
		  $data['product_id'] = $datajson->ProductList[$i]->ProductID;
		  $data['product_name'] = $datajson->ProductList[$i]->ProductName;
		  $data['suggest_price'] = $datajson->ProductList[$i]->SuggestPrice;
		  $data['discount_price'] = $datajson->ProductList[$i]->DiscountPrice;
		  $data['unit_price'] = $datajson->ProductList[$i]->UnitPrice;
		  $data['gender'] = $datajson->ProductList[$i]->gender;
		  $data['metal_type'] = $datajson->ProductList[$i]->metal_type;
		  $data['kadar_emas'] = $datajson->ProductList[$i]->kadar_emas;
		  $data['weight_gold'] = $datajson->ProductList[$i]->WeightGold;
		  $data['height'] = $datajson->ProductList[$i]->HeightCincin;
		  $data['width'] = $datajson->ProductList[$i]->WidthCincin;
		  $data['size'] = $datajson->ProductList[$i]->SizeCincin;
		  $data['qty'] = $datajson->ProductList[$i]->QtyStock;
		  $data['grafier'] = $datajson->ProductList[$i]->BiayaGrafier;
		  
		  //$this->product_model->insertProduct($data);
		  
		  }
		  
		   echo json_encode($datajson->ProductList);
		  
	  }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
