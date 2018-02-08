<?php declare(strict_types = 1);
namespace arhone\storage;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Class Storage
 * @package arhone\storage
 * @author Алексей Арх <info@arh.one>
 */
class Storage implements StorageInterface {

    /**
     * Настройки класса
     *
     * @var array
     */
    protected $config = [
        'file' => __DIR__ . '/storage/storage.s'
    ];

    /**
     * CacheFile constructor.
     * @param array $config
     */
    public function __construct (array $config = []) {

        $this->config($config);

    }

    /**
     * Возвращает значение файла
     *
     * @param string $key
     * @return mixed
     */
    public function get (string $key) {


    }

    /**
     * Записывает значение в файл
     *
     * @param string $key
     * @param $data
     * @param int|null $interval
     * @return bool
     */
    public function set (string $key, $data, int $interval = null) : bool {


    }

    /**
     * Удаление значения
     *
     * @param string $key
     * @return bool
     */
    public function delete (string $key) : bool {


    }

    /**
     * Проверка ключа
     *
     * @param string $key
     * @return bool
     */
    public function has (string $key) : bool {


    }

    /**
     * Задаёт конфигурацию
     *
     * @param array $config
     * @return array
     */
    public function config (array $config) : array {

        return $this->config = array_merge($this->config, $config);

    }


}