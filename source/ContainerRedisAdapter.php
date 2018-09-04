<?php declare(strict_types = 1);

namespace arhone\storing;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Class ContainerRedisAdapter
 * @package arhone\storing
 * @author Алексей Арх <info@arh.one>
 */
class ContainerRedisAdapter implements ContainerInterface {

    /**
     * Настройки класса
     *
     * @var array
     */
    protected $configuration = [
        'database' => null
    ];

    /**
     * @var \Redis
     */
    protected $Redis;

    /**
     * StorageRedis constructor.
     * @param \Redis $Redis
     * @param array $configuration
     */
    public function __construct (\Redis $Redis, array $configuration = []) {

        $this->Redis = $Redis;
        $this->configuration($configuration);

    }

    /**
     * Возвращает значение
     *
     * @param string $key
     * @return mixed
     */
    public function get (string $key) {

        return $this->Redis->get($key);

    }

    /**
     * Записывает значение
     *
     * @param string $key
     * @param $data
     */
    public function set (string $key, $data) : void {

        $this->Redis->set($key, serialize($data));

    }

    /**
     * Удаляет значения
     *
     * @param string $key
     */
    public function delete (string $key) : void {

        $this->Redis->del($key);

    }

    /**
     * Проверка ключа
     *
     * @param string $key
     * @return bool
     */
    public function has (string $key) : bool {

        return $this->Redis->exists($key) == true;

    }

    /**
     * Задаёт конфигурацию
     *
     * @param array $configuration
     * @return array
     */
    public function configuration (array $configuration) : array {

        $this->configuration = array_merge($this->configuration, $configuration);

        if ((int)$this->configuration['database']) {
            $this->Redis->select((int)$this->configuration['database']);
        }

        return $this->configuration;

    }


}