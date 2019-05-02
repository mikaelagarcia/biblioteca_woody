CREATE DATABASE bd_woody_faleconosco;

USE bd_woody_faleconosco;

CREATE tbl_faleconosco(

);

"INSERT INTO tbl_faleconosco
        (nome_fc,email_fc,telefone_fc,celular_fc, homepag_fc,
		url_fc,sugestao_fc,infoproduto_fc,sexo_fc,profissao_fc) VALUES ('".$nome."', 
                                                                    '".$email."', 
                                                                    '".$telefone."', 
                                                                    '".$celular."',
                                                                    '".$sexo."', 
                                                                    '".$profissao."',
																	'".$homepag."',
																	'".$url."',
																	'".$sugestao."',
																	'".$informacao."');"; 
