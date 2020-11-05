<?php declare(strict_types=1);

use Sharemat\Sdk\Api;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private $api;
    
    public function __construct()
    {
        if(file_get_contents(__DIR__ . '/../.env.test.local'))
            (new Dotenv())->load(__DIR__ . '/../.env.test.local');
        else
            (new Dotenv())->load(__DIR__ . '/../.env.test');
        
        $this->api = new Api($_ENV['SHAREMAT_API_HOSTNAME'], $_ENV['SHAREMAT_API_ACCESS_TOKEN']);
        
        parent::__construct();
    }
    
    public function testApiHasCats()
    {
        $this->assertTrue($this->api->hasCats());
    }

    public function testGetEquipments()
    {
        $response = $this->api->equipment()->getEquipments();
        
        $this->assertEquals($response['@context'], '/contexts/Equipment');
    }
}