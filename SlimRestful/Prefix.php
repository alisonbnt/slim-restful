<?php
	
namespace SlimRestful;

class Prefix{
	
	private $slimRestfulInstance;
	private $routePrefix;
	private $resources;
	
	public function __construct($routePrefix){
		$this->routePrefix = $routePrefix;
		$this->resources = array();
	}
	
	public function getRoutePrefix(){
		return $this->routePrefix;
	}
	
	public function setSlimRestfulInstance($srInstance){
		$this->slimRestfulInstance = $srInstance;
	}
	
	public function addResource($route, Resource $resource){
		$this->resources[$route] = $resource;
		return $resource;
	}
	
	public function removeResource($route){
		unset($this->resources[$route]);
	}
	
	public function getResource($route){
		return (isset($this->resources[$route]) ? $this->resources[$route] : null);
	}
	
	public function getResources(){
		return $this->resources;
	}
	
	public function setRoutePrefix($routePrefix, $updateSlimRestfulInstance = true){
		if($updateSlimRestfulInstance){
			$this->slimRestfulInstance->changeRoutePrefix($this->routePrefix, $routePrefix, false);	
		}
		$this->routePrefix = $routePrefix;
	}
	
}