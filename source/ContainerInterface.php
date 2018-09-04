<?php declare(strict_types = 1);

namespace arhone\storing;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Interface ContainerInterface
 * @package arhone\storing
 * @author Алексей Арх <info@arh.one>
 */
interface ContainerInterface {

    /**
     * Записывает значение в файл
     *
     * @param string $key
     * @param $data
     * @return void
     */
    public function set (string $key, $data) : void;

    /**
     * Возвращает значение файла
     *
     * @param string $key
     * @return mixed
     */
    public function get (string $key);

    /**
     * Проверяет существует ли ключ
     *
     * @param string $key
     * @return bool
     */
    public function has (string $key) : bool ;

    /**
     * Удаление значения
     *
     * @param string $key
     * @return void
     */
    public function delete (string $key) : void;

    /**
     * Задаёт конфигурацию
     *
     * @param array $configuration
     * @return array
     */
    public function configuration (array $configuration) : array;

}