<?php declare(strict_types = 1);

namespace arhone\storing;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Class StorageMemoryAdapter
 * @package arhone\storing
 * @author Алексей Арх <info@arh.one>
 */
class StorageMemoryAdapter implements StorageInterface {

    /**
     * Хранилище
     * 
     * @var array 
     */
    protected $memory = [];

    /**
     * Настройки
     * 
     * @var array 
     */
    protected $configuration = [];
    
    /**
     * StorageMemoryAdapter constructor.
     * @param array $configuration
     */
    public function __construct (array $configuration = []) {

        $this->configure($configuration);

    }

    /**
     * Возвращает значение
     *
     * @param string $key
     * @return mixed
     */
    public function get (string $key) {

        return $this->memory[$key] ?? null;

    }

    /**
     * Записывает значение
     *
     * @param string $key
     * @param $data
     * @return bool
     */
    public function set (string $key, $data) : bool {

        $this->memory[$key] = $data;
        return true;

    }

    /**
     * Удаляет значения
     *
     * @param string $key
     * @return bool
     */
    public function delete (string $key) : bool {

        unset($this->memory[$key]);
        return true;

    }

    /**
     * Проверка ключа
     *
     * @param string $key
     * @return bool
     */
    public function has (string $key) : bool {

        return isset($this->memory[$key]);

    }

    /**
     * Наполнение контейнера
     *
     * @param array $data
     * @return bool
     */
    public function fill (array $data) : bool {

        $this->memory = $data;
        return true;

    }

    /**
     * Очистить контейнер
     *
     * @return bool
     */
    public function clear () : bool {

        $this->memory = [];
        return true;

    }

    /**
     * Задаёт конфигурацию
     *
     * @param array $configuration
     * @return array
     */
    public function configure (array $configuration = []) : array {

        return $this->configuration = array_merge($this->configuration, $configuration);

    }

}