# mybase_laravel_api

---

- Create and insert data to table `m_api_response` database first  

```
CREATE TABLE `m_api_response` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_point` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_number` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

INSERT INTO `m_api_response` (`id`, `method`, `end_point`, `response_number`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, -1, 'Perhatian', 'Error', '2022-03-06 12:24:41', NULL),
(2, NULL, NULL, 0, 'Perhatian', 'Failed', '2022-03-06 12:24:41', NULL),
(3, NULL, NULL, 1, 'Perhatian', 'Success', '2022-03-06 12:24:41', NULL);
```

---

```
Copyright 2022 M. Fadli Zein
```