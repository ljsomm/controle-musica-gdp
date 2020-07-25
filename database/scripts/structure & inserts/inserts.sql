/*Instrumentos*/
INSERT INTO tb_instrumento (cd_instrumento, nm_instrumento) VALUES (1, 'Violão'),
(2, 'Guitarra'),
(3, 'Baixo'),
(4, 'Bateria'),
(5, 'Piano'),
(6, 'Teclado'),
(7, 'Saxofone'),
(8, 'Trompete'),
(9, 'Violino'),
(10, 'Ukulele'),
(11, 'Cajon'),
(12, 'Tuba');

INSERT INTO tb_grau_afinidade (cd_grau_afinidade, sg_grau_afinidade, nm_grau_afinidade, ds_grau_afinidade) VALUES (1, 'I', 'Irregular', 'Diz respeito a uma música que não é recomendada para shows ou apresentações e deve ser tratada com mais atenção!'),
(2, 'R', 'Regular', 'Diz respeito a uma música que não é está nas melhores condições e requeer certa atenção!'),
(3, 'B', 'Bom', 'Diz respeito a uma música que está quase perfeita, pode ser melhorada, mas já pode-se cogitar usar esta em apresentações!'),
(4, 'MB', 'Muito Bom', 'Diz respeito a uma música que está em perfeito estado, pode, com toda certeza, usa-lá em apresentações!');

INSERT INTO tb_tipo_vocal(cd_tipo_vocal, nm_tipo_vocal) VALUES (1, 'Principal'),  
(2, 'Segunda Voz'), 
(3, 'Backing Vocal');

INSERT INTO tb_tipo_musica (sg_tipo_musica, nm_tipo_musica) VALUES ('C', 'Cover'),
('A', 'Autoral');
