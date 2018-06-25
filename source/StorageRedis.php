<?php declare(strict_types = 1);

namespace arhone\storage;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Class StorageRedis
 * @package arhone\storage
 * @author Алексей Арх <info@arh.one>
 */
class StorageRedis implements StorageInterface {

    /**
     * Настройки класса
     *
     * @var array
     */
    protected $config = [
        'database' => null
    ];

    /**
     * @var \Redis
     */
    protected $Redis;

    /**
     * StorageRedis constructor.
     * @param \Redis $Redis
     */
    public function __construct (\Redis $Redis) {

        $this->Redis = $Redis;

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
     * @return bool
     */
    public function set (string $key, $data) : bool {

        return $this->Redis->set($key, serialize($data)) == true;

    }

    /**
     * Удаляет значения
     *
     * @param string $key
     * @return bool
     */
    public function delete (string $key) : bool {

        return $this->Redis->del($key) == true;

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
     * @param array $config
     * @return array
     */
    public function config (array $config) : array {

        $this->config = array_merge($this->config, $config);

        if ((int)$this->config['database']) {
            $this->Redis->select((int)$this->config['database']);
        }

        return $this->config;

    }


}