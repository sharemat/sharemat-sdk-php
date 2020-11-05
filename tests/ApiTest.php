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
    
    public function testCreateGreetings()
    {
        $test = [];
        $response = $this->api->greetings()->createGreetings($test);
        
        $this->assertEquals($response['@context'], '/contexts/Greeting');
    }
    
    public function testGetCustomerToAffiliate()
    {
        $response = $this->api->customerToAffiliate()->getCustomerToAffiliates();
        
        $this->assertEquals($response['@context'], '/contexts/CustomerToAffiliate');
    }
    
    public function testGetCustomerToAffiliateToAddresses()
    {
        $response = $this->api->customerToAffiliateToAddress()->getCustomerToAffiliateToAddresses();
        
        $this->assertEquals($response['@context'], '/contexts/CustomerToAffiliateToAddress');
    }
    
    public function testGetCustomerToAffiliateToUsers()
    {
        $response = $this->api->customerToAffiliateToUser()->getCustomerToAffiliateToUsers();
        
        $this->assertEquals($response['@context'], '/contexts/CustomerToAffiliateToUser');
    }
}