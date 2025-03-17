<?php

namespace Benchmarks;

use Illuminate\Support\Collection;
use RuntimeException;

/**
 * Benchmark intersect
 *
 * @BeforeMethods({"init"})
 * @AfterMethods({"check"})
 */
class InArrayBench
{
    private array $source;

    private array $target;

    private array $whereInSource;

    private array $whereInTarget;

    private array $intersects;

    public function init(): void
    {
        $this->source = range(1, 10000);

        shuffle($this->source);

        $this->target = range(9991, 19990);

        shuffle($this->target);
        // intersect item is 10 - 10, 10 items

        $this->whereInSource = array_map(function ($item) {
            return ['id' => $item];
        }, $this->source);

        $this->whereInTarget = array_map(function ($item) {
            return ['id' => $item];
        }, $this->target);
    }

    public function check()
    {
        if (count($this->intersects) !== 10) {
            throw new RuntimeException('Check error, expect count is 1001, actual is ' . count($this->intersects));
        }
    }

    private static function phpForeach(array $data, mixed $target): bool
    {
        foreach ($data as $item) {
            if ($item === $target) {
                return true;
            }
        }

        return false;
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchForeach(): void
    {
        $this->intersects = [];
        foreach ($this->source as $item) {
            if (self::phpForeach($this->target, $item)) {
                $this->intersects[] = $item;
            }
        }
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchInArray(): void
    {
        $this->intersects = [];
        foreach ($this->source as $item) {
            if (in_array($item, $this->target, true)) {
                $this->intersects[] = $item;
            }
        }
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchArrayFlipAndArrayKeyExists(): void
    {
        $this->intersects = [];
        $source = array_flip($this->source);

        foreach ($this->target as $item) {
            if (array_key_exists($item, $source)) {
                $this->intersects[] = $item;
            }
        }
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchArrayIntersect(): void
    {
        $this->intersects = array_intersect($this->source, $this->target);
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchCollectionWhereIn(): void
    {
        $this->intersects = Collection::make($this->whereInSource)
            ->whereIn('id', $this->target)
            ->toArray();
    }

    /**
     * @Revs(20)
     * @Iterations(3)
     */
    public function benchCollectionIntersect(): void
    {
        $this->intersects = Collection::make($this->source)
            ->intersect($this->target)
            ->toArray();
    }
}
