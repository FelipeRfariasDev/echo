CREATE TABLE `chamados` (
                            `id` int(11) NOT NULL,
                            `km_rodado` double NOT NULL,
                            `data` date NOT NULL,
                            `funcionario_id` int(11) NOT NULL,
                            `veiculo_id` int(11) NOT NULL,
                            `usuario_id` int(11) NOT NULL,
                            `disponivel` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `funcionarios` (
                                `id` int(11) NOT NULL,
                                `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                                `cpf` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                                `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `usuario` (
                           `id` int(11) NOT NULL,
                           `cnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
                           `razao_social` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                           `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                           `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `veiculos` (
                            `id` int(11) NOT NULL,
                            `placa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                            `modelo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                            `marca` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                            `autonomia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
                            `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `chamados`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kf_veiculo_disponivel` (`disponivel`,`veiculo_id`,`data`),
  ADD KEY `fk_chamados_funcionarios_idx` (`funcionario_id`),
  ADD KEY `fk_chamados_veiculos_idx` (`veiculo_id`),
  ADD KEY `fk_chamados_usuario_idx` (`usuario_id`);


ALTER TABLE `funcionarios`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD KEY `fk_funcionarios_usuario1_idx` (`usuario_id`);


ALTER TABLE `usuario`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);


ALTER TABLE `veiculos`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa_UNIQUE` (`placa`),
  ADD KEY `fk_veiculos_usuario1_idx` (`usuario_id`);


ALTER TABLE `chamados`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `funcionarios`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `usuario`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `veiculos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `chamados`
    ADD CONSTRAINT `fk_chamados_funcionarios` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamados_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamados_veiculos` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `funcionarios`
    ADD CONSTRAINT `fk_funcionarios_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `veiculos`
    ADD CONSTRAINT `fk_veiculos_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
