<?php
namespace Dbabraj\Joke;

class JokeApi
{
	const END_POINT = 'http://ec2-35-156-131-145.eu-central-1.compute.amazonaws.com/list';
	private $http;
	private $decodedSite;
	
	public function __construct($http) {
		$this->http = $http;
		
		$this->decodedSite = json_decode(
		  $this->http->request('GET', self::END_POINT)->getBody(),
		  true
		);
	}
	
	public function randomJoke() {

		$losowaLiczba = rand(0,9);
		echo $this->decodedSite[$losowaLiczba]['content']."<br /> ~" .$this->decodedSite[$losowaLiczba]['author'].' '.$this->decodedSite[$losowaLiczba]['year']."<br />";
	}
	
	public function all() {
		
		for ($i = 0; $i < 10; $i++) {
			echo ($i+1).". ".$this->decodedSite[$i]['content']."<br /> ~" .$this->decodedSite[$i]['author'].' '.$this->decodedSite[$i]['year']."<br /><br />";
		}
	}
}