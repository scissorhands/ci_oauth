<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Demo extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function analytics_tagcloud() {
		$return = "<div id=\"sp_tagcloud2\">";
		$return.= "<a href='#' class='tagclouders' rel ='145'>Metales</a>";
		$return.= "<a href='#' class='tagclouders' rel ='142'>Bebidas</a>";
		$return.= "<a href='#' class='tagclouders' rel ='212'>Lacteos</a>"; //
		$return.= "<a href='#' class='tagclouders' rel ='203'>Productos Quimicos</a>";
		$return.= "<a href='#' class='tagclouders' rel ='173'>Combustibles</a>";
		$return.= "<a href='#' class='tagclouders' rel ='201'>Plasticos</a>";
		$return.= "<a href='#' class='tagclouders' rel ='175'>Minerales</a>";
		$return.= "<a href='#' class='tagclouders' rel ='123'>Refacciones automotrices</a>";
		$return.= "<a href='#' class='tagclouders' rel ='165'>Educativos</a>";
		$return.= "<a href='#' class='tagclouders' rel ='221'>Manufactura de piedras</a>"; //
		$return.= "<a href='#' class='tagclouders' rel ='240'>Maquinarias</a>"; //
		$return.= "<a href='#' class='tagclouders' rel ='160'>Lecturas infantiles</a>";
		$return.= "<a href='#' class='tagclouders' rel ='240'>Combustibles</a>"; //
		$return.= "<a href='#' class='tagclouders' rel ='199'>Servicios contables</a>";
		$return.= "<a href='#' class='tagclouders' rel ='185'>Productosvegetales</a>";
		$return.= "<a href='#' class='tagclouders' rel ='183'>Carnes</a>";
		$return.= "<a href='#' class='tagclouders' rel ='234'>Material de transporte</a>"; //
		$return.= "<a href='#' class='tagclouders' rel ='172'>Insumos para limpieza</a>";
		$return.= "<a href='#' class='tagclouders' rel ='173'>Alimentos</a>";
		$return.= "<a href='#' class='tagclouders' rel ='172'>Oro</a>";
		$return.= "<a href='#' class='tagclouders' rel ='156'>Papeles</a>";
		$return.= "<a href='#' class='tagclouders' rel ='112'>Tabacos</a>";
		$return.= "<a href='#' class='tagclouders' rel ='201'>Material electrico</a>";
		$return.= "</div>";
		return $return;
	}
	public function analytics_referrers() {
		$return = "<div class='item_superpagina'>Goolgle</div>";
		$return.= "<div class='item_superpagina'>Seccion Amarilla</div>";
		$return.= "<div class='item_superpagina'>Bing</div>";
		$return.= "<div class='item_superpagina'>Yahoo</div>";
		$return.= "<div class='item_superpagina'>SecureSearch</div>";
		return $return;
	}
	public function analytics_topcities() {
		$return = "<div class='item_superpagina'>Mexico City</div>";
		$return.= "<div class='item_superpagina'>Guadalajara</div>";
		$return.= "<div class='item_superpagina'>Monterrey</div>";
		$return.= "<div class='item_superpagina'>Puebla</div>";
		$return.= "<div class='item_superpagina'>Santiago de Queretaro</div>";
		return $return;
	}
	public function analytics_keywords() {
		$return = "<div class='item_superpagina'>Maquinarias</div>";
		$return.= "<div class='item_superpagina'>Combustibles</div>";
		$return.= "<div class='item_superpagina'>Material de transporte</div>";
		$return.= "<div class='item_superpagina'>Manufactura de piedras</div>";
		$return.= "<div class='item_superpagina'>Lacteos</div>";
		return $return;
	}
	public function analytics_mapa() {
		$return = "[['State', 'Visitas'],";
		$return.= "['Distrito Federal', 1600000],";
		$return.= "['Jalisco', 900000],";
		$return.= "['Nuevo León', 650000],";
		$return.= "['Mexico', 440000],";
		$return.= "['Baja California', 335000],";
		$return.= "['Puebla', 315000],";
		$return.= "['Guanajuato', 280000],";
		$return.= "['Sonora', 275000],";
		$return.= "['Veracruz', 270000],";
		$return.= "['Chihuahua', 265000],]";
		return $return;
	}
	public function chart_analytics () {
		$data=array(
			"referencias" => array("Google","Seccion Amarilla","Yahoo","Bing","SafeSearch"),
			"desktop" => array(63500,56000,49500,40450,39040),
			"tablet" => array(33000,25000,24200,35000,19400),
			"mobile" => array(12000,10000,13500,10300,7500)
		);
		return $data;
	}
	public function home_agendize() {
		$data['clients_']="4,640";
		$data['duration_']="220:20:17";
		return $data;
	}
	public function home_maxiclic() {
		$data['clients']=number_format(2569);
		$data['historical_clients']=number_format(7585);
		$data['impressions']=number_format(8125976);
		$data['clicks']=number_format(193507);
		$data['total_spent']="$".number_format(730463);
		$data['ctr']="4.379%";
		$data['cpc']="$3.775";
		return $data;
	}
	public function home_papelweb() {
		$data[0]=new stdClass();
		$data[0]->visit=20050;
		return $data;
	}
	public function home_portal($dato) {
		switch ($dato) {
			case 'visit':
				$data = 3930422;
				break;
			case 'pa':
				$data = 653449147; //seconds
				break;
			case 'avg':
				$data = 166.254195351; //seconds
				break;
			case 'view':
				$data = 9073064;
				break;
			case 'twitter':
				$data = 5906;
				break;
		}
		return $data;
	}
	public function home_produccion() {
		$data['opened']=number_format(48);
		$data['closed']=number_format(4243);
		$data['totalTickets']=number_format(4291);
		return $data;
	}
	public function home_superpagina($dato) {
		switch ($dato) {
			case 'visit':
				$data = 493090;
				break;
			case 'pa':
				$data = 140650560; //seconds
				break;
			case 'avg':
				$data = 285; //seconds
				break;
			case 'site':
				$data = 50035;
				break;
			case 'visitor':
				$data = 434849;
				break;
		}
		return $data;
	}
	public function chart_agendize() {
		$data['dates']=array("2013-08-25","2013-08-26","2013-08-27","2013-08-28","2013-08-29","2013-08-30","2013-08-31","2013-09-01","2013-09-02","2013-09-03","2013-09-04","2013-09-05","2013-09-06","2013-09-07","2013-09-08");
		$data['calls']=array(319,847,798,818,747,817,444,305,826,722,951,811,772,487,240);
		return $data;
	}
	public function chart_maxiclic($type) {
		if($type==1) {			
			$data['imparray']=array(
				array("DATE"=>"2013-08-25","IMPRESSIONS"=>"488570"),
				array("DATE"=>"2013-08-26","IMPRESSIONS"=>"582846"),
				array("DATE"=>"2013-08-27","IMPRESSIONS"=>"561156"),
				array("DATE"=>"2013-08-28","IMPRESSIONS"=>"535820"),
				array("DATE"=>"2013-08-29","IMPRESSIONS"=>"525558"),
				array("DATE"=>"2013-08-30","IMPRESSIONS"=>"505558"),
				array("DATE"=>"2013-08-31","IMPRESSIONS"=>"381977"),
				array("DATE"=>"2013-09-01","IMPRESSIONS"=>"506039"),
				array("DATE"=>"2013-09-02","IMPRESSIONS"=>"626259"),
				array("DATE"=>"2013-09-03","IMPRESSIONS"=>"598957"),
				array("DATE"=>"2013-09-04","IMPRESSIONS"=>"618399"),
				array("DATE"=>"2013-09-05","IMPRESSIONS"=>"608911"),
				array("DATE"=>"2013-09-06","IMPRESSIONS"=>"566811"),
				array("DATE"=>"2013-09-07","IMPRESSIONS"=>"498626"),
				array("DATE"=>"2013-09-08","IMPRESSIONS"=>"520489")
			);
			$data['clicksarray']=array(
				array("DATE"=>"2013-08-25","CLICKS"=>"10187"),
				array("DATE"=>"2013-08-26","CLICKS"=>"13732"),
				array("DATE"=>"2013-08-27","CLICKS"=>"13129"),
				array("DATE"=>"2013-08-28","CLICKS"=>"12880"),
				array("DATE"=>"2013-08-29","CLICKS"=>"12962"),
				array("DATE"=>"2013-08-30","CLICKS"=>"11417"),
				array("DATE"=>"2013-08-31","CLICKS"=>"8643"),
				array("DATE"=>"2013-09-01","CLICKS"=>"11400"),
				array("DATE"=>"2013-09-02","CLICKS"=>"14493"),
				array("DATE"=>"2013-09-03","CLICKS"=>"15183"),
				array("DATE"=>"2013-09-04","CLICKS"=>"15121"),
				array("DATE"=>"2013-09-05","CLICKS"=>"15128"),
				array("DATE"=>"2013-09-06","CLICKS"=>"14310"),
				array("DATE"=>"2013-09-07","CLICKS"=>"12620"),
				array("DATE"=>"2013-09-08","CLICKS"=>"12302")
			);
		} else {
			$data['ctrarray'] = array(
				array("DATE"=>"2013-08-25","CTR"=>3.83868742445),
				array("DATE"=>"2013-08-26","CTR"=>4.42475375979),
				array("DATE"=>"2013-08-27","CTR"=>4.53326229362),
				array("DATE"=>"2013-08-28","CTR"=>4.38039623681),
				array("DATE"=>"2013-08-29","CTR"=>4.55844411209),
				array("DATE"=>"2013-08-30","CTR"=>4.5971107477),
				array("DATE"=>"2013-08-31","CTR"=>4.50391633),
				array("DATE"=>"2013-09-01","CTR"=>3.91406026505),
				array("DATE"=>"2013-09-02","CTR"=>4.3245562747),
				array("DATE"=>"2013-09-03","CTR"=>4.42153731829),
				array("DATE"=>"2013-09-04","CTR"=>4.45449080869),
				array("DATE"=>"2013-09-05","CTR"=>4.65841708366),
				array("DATE"=>"2013-09-06","CTR"=>4.54919644553),
				array("DATE"=>"2013-09-07","CTR"=>4.41200080436),
				array("DATE"=>"2013-09-08","CTR"=>4.01815164227)
			);
			$data['cpcarray'] = array(
				array("DATE"=>"2013-08-25","CPC"=>3.89698272578),
				array("DATE"=>"2013-08-26","CPC"=>3.79699788109),
				array("DATE"=>"2013-08-27","CPC"=>3.78811630388),
				array("DATE"=>"2013-08-28","CPC"=>3.79119011795),
				array("DATE"=>"2013-08-29","CPC"=>3.78384887401),
				array("DATE"=>"2013-08-30","CPC"=>3.82454689333),
				array("DATE"=>"2013-08-31","CPC"=>3.43646204684),
				array("DATE"=>"2013-09-01","CPC"=>3.8218272235),
				array("DATE"=>"2013-09-02","CPC"=>3.77962886731),
				array("DATE"=>"2013-09-03","CPC"=>3.76130655109),
				array("DATE"=>"2013-09-04","CPC"=>3.75293776778),
				array("DATE"=>"2013-09-05","CPC"=>3.77238823769),
				array("DATE"=>"2013-09-06","CPC"=>3.80092033855),
				array("DATE"=>"2013-09-07","CPC"=>3.82600966214),
				array("DATE"=>"2013-09-08","CPC"=>3.78402919149)
			);
		}
		return $data;
	}
	public function chart_papelweb() {
		$data['dates']=array("2013-08-25","2013-08-26","2013-08-27","2013-08-28","2013-08-29","2013-08-30","2013-08-31","2013-09-01","2013-09-02","2013-09-03","2013-09-04","2013-09-05","2013-09-06","2013-09-07","2013-09-08");
		$data['visits']=array(1181,1645,1541,1536,1640,1511,1133,1058,1582,1610,1638,1667,1675,1172,1071);
		$data['visits_uniq']=array(848,1349,1315,1265,1337,1272,954,886,1349,1346,1342,1352,1422,976,880);
		return $data;
	}
	public function chart_pie() {
		$data=array(
			array("Metales",118003),
			array("Productos Quimicos",74677),
			array("Alimentos, bebidas y tabacos",69127),
			array("Plasticos y caucho",41995),
			array("Material de transporte",30510),
			array("Productos animales y vegetales",24623),
			array("Maquinarias y material eléctrico",23219),
			array("Manufactura, piedras y vidrios",14446),
			array("Combustibles",13245),
			array("Minerales",11102),
			array("Otros",28863),
		);
		return $data;
	}
	public function chart_portal() {
		$data['visitas']	= array(149221,321512,314579,310090,299492,280188,189558,157256,326288,317565,315237,308122,286121,196581,158612);
		$data['pvistas']	= array(133006,281583,276404,271936,264131,247185,168714,140112,287030,280829,278412,272470,252607,175117,141751);
		return $data;
	}
	public function chart_produccion() {
		$data['tickets']=array(198,346,470,542,397,292,272,302,200,260,259,198,222,206,79);
		$data['dates']=array("2013-08-25","2013-08-26","2013-08-27","2013-08-28","2013-08-29","2013-08-30","2013-08-31","2013-09-01","2013-09-02","2013-09-03","2013-09-04","2013-09-05","2013-09-06","2013-09-07","2013-09-08");
		$data['serie']=$data['tickets'];
		$data['categories']=$data['dates'];
		return $data;
	}
	public function chart_superpagina() {
		$data['visitas']=array(20261,41654,40933,38961,37114,32808,21220,20263,40033,40277,40126,38653,35014,24337,21436);
		$data['pvistas']=array(19351,39043,38433,36498,34858,30850,20253,19294,37715,37755,37555,36179,32718,23026,20351);
		$data['tpromedio']=array(242.199545926,300.721755414,292.555615274,301.872718873,304.598588134,299.965099976,234.479594722,248.817450526,287.370144631,300.444397547,298.324577581,318.291180503,285.702433312,249.836504088,211.443692853);
		return $data;		
	}
	public function single_agendize() {		
		$this->lang->load('site', $this->session->userdata('language'));
		$data['Clientes']['Clientes']	= "4,640";
		$data['Total'][$this->lang->line('site_Llamadas')]	= "9,904";
		$data['Total'][$this->lang->line('site_Tiempo')]	= "220:20:17";
		$data['Total'][$this->lang->line('site_Promedio')]	= "83.36 ".$this->lang->line('site_Segundos');
		$data['Completed'][$this->lang->line('site_Llamadas')]	= "5,561";
		$data['Completed'][$this->lang->line('site_Tiempo')]	= "202:24:29";
		$data['Completed'][$this->lang->line('site_Promedio')]	= "131.03 ".$this->lang->line('site_Segundos');
		$data['Abandoned'][$this->lang->line('site_Llamadas')]	= "3,581";
		$data['Abandoned'][$this->lang->line('site_Tiempo')]	= "16:44:36";
		$data['Abandoned'][$this->lang->line('site_Promedio')]	= "16.83 ".$this->lang->line('site_Segundos');
		$data['Wrong number'][$this->lang->line('site_Llamadas')]	= "269";
		$data['Wrong number'][$this->lang->line('site_Tiempo')]	= "02:36:14";
		$data['Wrong number'][$this->lang->line('site_Promedio')]	= "34.85 ".$this->lang->line('site_Segundos');
		$data['Busy'][$this->lang->line('site_Llamadas')]	= "202";
		$data['Busy'][$this->lang->line('site_Tiempo')]	= "01:36:44";
		$data['Busy'][$this->lang->line('site_Promedio')]	= "83.36 ".$this->lang->line('site_Segundos');
		$data['No answered'][$this->lang->line('site_Llamadas')]	= "291";
		$data['No answered'][$this->lang->line('site_Tiempo')]	= "05:58:14";
		$data['No answered'][$this->lang->line('site_Promedio')]	= "73.86 ".$this->lang->line('site_Segundos');
		return $data;
	}
	public function single_produccion() {
		$this->lang->load('site', $this->session->userdata('language'));
		$data = $this->home_produccion();
		$data['table']="<table class=\"table\"><tr><td>"
		.$this->lang->line('site_Palabras Clave')
		."<td><td>23<td></tr><tr><td>"
		.$this->lang->line('site_SuperPaginas')
		."<td><td>1,093<td></tr><tr><td>"
		.$this->lang->line('site_Maxiclic')
		."<td><td>160<td></tr><tr><td>"
		.$this->lang->line('site_URL')
		."<td><td>2<td></tr></table>";
		return $data;
	}
}