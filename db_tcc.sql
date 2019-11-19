-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2019 às 19:47
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automobiles`
--

CREATE TABLE `automobiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `km` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kmDay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateReview` date NOT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `record` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneP` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneS` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tell` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberHouse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `date`, `record`, `status`, `sex`, `email`, `phoneP`, `phoneS`, `tell`, `address`, `district`, `numberHouse`, `comp`, `city`, `state`, `cep`, `created_at`, `updated_at`) VALUES
(1, 'Lavinia Dias Barros', '1953-04-26', '847.788.476-52', '1', 'Feminino', 'laviniaDiasBarros@armyspy.com', '19992333132', NULL, NULL, 'Rua Altino Arantes', 'Centro', '152', NULL, 'Conchal', 'São Paulo', '13835000', '2019-11-05 03:48:26', '2019-11-05 03:48:26'),
(2, 'Emilly Barbosa Fernandes', '1962-08-22', '694.426.126-03', '1', 'Feminino', 'emillyBarbosaFernandes@rhyta.com', '19000009866', NULL, NULL, 'Praça João Oliveira Guerra', 'Centro', '970', NULL, 'Guaruja', 'São Paulo', '13835000', '2019-11-05 03:51:23', '2019-11-05 03:51:23'),
(3, 'João Gomes Cardoso', '1959-04-03', '995.609.569-90', '1', 'Masculino', 'joaoGomesCardoso@armyspy.com', '19-8809-3984', NULL, NULL, 'Rua Quintanilha', 'Zona Leste', '1231', NULL, 'Rio de Janeiro', 'Rio de Janeiro', '13835000', '2019-11-05 03:52:47', '2019-11-05 03:52:47'),
(4, 'Gustavo Dias Melo', '1964-08-17', '896.995.508-99', '1', 'Masculino', 'gustavoDiasMelo@teleworm.us', '1962152521', NULL, NULL, 'Viela Arnaldo Ricardo Ventura Nitão', 'Planalto', '152', NULL, 'Osasco', 'São Paulo', '13835000', '2019-11-05 03:54:12', '2019-11-05 03:54:12'),
(5, 'Sofia Cardoso Lima', '0035-12-05', '246.415.772-42', '1', 'Masculino', 'sofiaCardosoLima@teleworm.us', '1982627212', NULL, NULL, 'Rua Ricardo M. da Silva', 'Centro', '1991', NULL, 'Barbacena', 'Minas Gerais', '13835000', '2019-11-05 03:55:23', '2019-11-05 03:55:23'),
(6, 'Daniel Rocha Pereira', '1997-04-11', '293.865.067-18', '1', 'Masculino', 'danielRochaPereira@dayrep.com', '1972524142', NULL, NULL, 'Rua José Balbino Negrão', 'Zona Norte', '1221', NULL, 'Avare', 'São Paulo', '13835000', '2019-11-05 03:56:41', '2019-11-05 03:56:41'),
(7, 'José Sousa Barbosa', '1973-02-01', '872.295.916-51', '1', 'Masculino', 'joseSousaBarbosa@teleworm.us', '16251425112', NULL, NULL, 'Rua Manoel Pedro de Campos', 'centro', '1732', NULL, 'Três Lagoas', 'Mato Grosso do Sul', '13835000', '2019-11-05 03:58:00', '2019-11-05 03:58:00'),
(8, 'Tomás Fernandes Goncalves', '1970-04-28', '146.358.365-68', '1', 'Masculino', 'TomasFernandesGoncalves@jourrapide.com', '16251425112', NULL, NULL, 'Rua Trinta e Sete', 'Esperança III', '124', NULL, 'Resende', 'Rio de Janeiro', '13835000', '2019-11-05 03:59:04', '2019-11-05 03:59:04'),
(9, 'Douglas Silva Fernandes', '1965-08-02', '423.908.083-52', '1', 'Masculino', 'DouglasSilvaFernandes@teleworm.us', '1972524142', NULL, NULL, 'Quadra QE 44 Conjunto S', 'Novo Horizonte', '125', NULL, 'Guara', 'Distrito Federal', '13835000', '2019-11-05 04:00:24', '2019-11-05 04:00:24'),
(10, 'Vitor Castro Melo', '1969-02-19', '845.816.035-87', '1', 'Masculino', 'VitorCastroMelo@armyspy.com', '1972524142', NULL, NULL, 'Rua 27', 'Centro', '1213', NULL, 'Luziania', 'Goiás', '13835000', '2019-11-05 04:01:27', '2019-11-05 04:01:27'),
(11, 'Vitória Cavalcanti Almeida', '1997-09-19', '904.875.120-90', '2', 'Masculino', 'VitoriaCavalcantiAlmeida@rhyta.com', '1972524142', NULL, NULL, '1ª Travessa Doutor Expedito Lopes', 'Morumbi', '1213', NULL, 'Conchal', 'São Paulo', '13835000', '2019-11-05 04:02:21', '2019-11-07 01:15:15');
-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_07_234629_create_clients_table', 1),
(15, '2019_08_19_224800_create_providers_table', 1),
(16, '2019_08_20_003223_create_products_table', 1),
(17, '2019_09_02_165202_create_provand_prods_table', 1),
(18, '2019_09_06_144043_create_service_orders_table', 1),
(19, '2019_09_17_182208_create_automobiles_table', 1),
(20, '2019_09_23_194338_create_notes_table', 1),
(21, '2019_10_17_102832_create_sales_table', 1),
(22, '2019_10_17_135016_create_sales_products_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceNew` double(8,2) NOT NULL,
  `priceOld` double(8,2) NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provand_prods`
--

CREATE TABLE `provand_prods` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameFant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneP` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tell` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberHouse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protocol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protocolOrder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typePay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `protocol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `service_orders`
--

CREATE TABLE `service_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `protocol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateExec` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Administrador', 'admin@admin.com', NULL, '$2y$10$jpBuoevz3HCjE2as7KvTQ.I2sLdJC/CWHg4gVlf6NWVvLVb8fIfT2', 'vkO75vN4WIQCKr8FBZhGNtZ0xAxFlw62g6hlXmd5z1UJNYx1N7z7si7WKD5l', '2019-11-05 03:45:35', '2019-11-05 03:45:35');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobiles`
--
ALTER TABLE `automobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provand_prods`
--
ALTER TABLE `provand_prods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provand_prods_product_id_foreign` (`product_id`),
  ADD KEY `provand_prods_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobiles`
--
ALTER TABLE `automobiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provand_prods`
--
ALTER TABLE `provand_prods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service_orders` (`id`);

--
-- Limitadores para a tabela `provand_prods`
--
ALTER TABLE `provand_prods`
  ADD CONSTRAINT `provand_prods_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `provand_prods_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Limitadores para a tabela `sales_products`
--
ALTER TABLE `sales_products`
  ADD CONSTRAINT `sales_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `service_orders`
--
ALTER TABLE `service_orders`
  ADD CONSTRAINT `service_orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
