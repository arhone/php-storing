<?php declare(strict_types = 1);

namespace arhone\storing;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Class ContainerMemoryAdapter
 * @package arhone\storing
 * @author Алексей Арх <info@arh.one>
 */
class ContainerMemoryAdapter implements ContainerInterface {

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
     * ContainerMemoryAdapter constructor.
     * @param array $configuration
     */
    public function __construct (array $configuration = []) {

        $this->configuration($configuration);

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
     * @return void
     */
    public function set (string $key, $data) : void {

        $this->memory[$key] = $data;

    }

    /**
     * Удаляет значения
     *
     * @param string $key
     * @return void
     */
    public function delete (string $key) : void {

        unset($this->memory[$key]);

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