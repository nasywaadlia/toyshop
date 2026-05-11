<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class CategoryUITest extends TestCase
{
    protected $driver;

    protected function setUp(): void
    {
        $host = 'http://localhost:58121';

        $capabilities = DesiredCapabilities::chrome();

        $capabilities->setCapability(
            'ms:edgeOptions',
            [
                // sesuaikan hasil "where msedge"
                'binary' => 'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'
            ]
        );

        $this->driver = RemoteWebDriver::create(
            $host,
            $capabilities
        );
    }

    public function testFilterProductByCategory()
    {
        // buka homepage
        $this->driver->get('http://localhost:8081');

        sleep(3);

        // klik dropdown kategori
        $dropdown = $this->driver->findElement(
            WebDriverBy::xpath("//button[contains(text(),'Kategori')]")
        );

        $dropdown->click();

        sleep(2);

        // klik kategori Boneka
        $boneka = $this->driver->findElement(
            WebDriverBy::linkText('Boneka')
        );

        $boneka->click();

        sleep(3);

        // scroll ke bawah
        $this->driver->executeScript(
            "window.scrollTo(0, document.body.scrollHeight);"
        );

        sleep(3);

        // ambil isi halaman
        $page = $this->driver->getPageSource();

        // cek kategori tampil
        $this->assertStringContainsString(
            'Boneka',
            $page
        );

        // cek produk kategori boneka tampil
        $this->assertStringContainsString(
            'Jellycat',
            $page
        );
    }

    protected function tearDown(): void
    {
        if ($this->driver) {
            try {
                $this->driver->quit();
            } catch (\Exception $e) {
            }
        }
    }
}