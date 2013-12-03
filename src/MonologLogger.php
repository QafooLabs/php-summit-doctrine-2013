<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Doctrine\DBAL\Logging\SQLLogger;

class MonologLogger implements SQLLogger
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler('queries.log', Logger::DEBUG));
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->logger->debug($sql . "\n" . json_encode($params) . "\n");
    }

    public function stopQuery()
    {
    }
}
