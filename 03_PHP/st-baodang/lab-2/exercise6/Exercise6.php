<?php

// Xử lý case nếu như $data là array
function arrayHandle($data, $filter)
{
    if ($filter) {
        return count(array_filter($data, function ($value) use ($filter) {
            return str_contains($value, $filter);
        }));
    }
    return count($data);
}

// Trả về kết quả dựa trên kiểu dữ liệu của $data
function handleMix(int|float|string|array $data, string $filter = null): int
{
    return match (gettype($data)) {
        "integer" => $data,
        "double" => round($data, 0),
        "string" => strlen($data),
        "array" => arrayHandle($data, $filter)
    };
}

echo handleMix(["1.3", "1232", "sss"], "1");
