<?php
namespace ArtinCMS\LBDM;
use Illuminate\Support\Facades\Facade;

class LBDMFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return 'LBDMC';
	}
}