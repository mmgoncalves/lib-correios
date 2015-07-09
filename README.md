# lib-correios
Classe em PHP, para busca de endereços a partir do CEP, utilizando o webservice dos correios. Com calculo de frete e prazo de entrega.

## Método _calcularFrete($arrConfig)_
Realiza o calculo do frete, e do prazo de entrega aproximado.

__O método recebe como parâmetro um array de configurações, que deve ser enviado de acordo com o exemplo abaixo:__
* $arrConfig['codigo'] = "40010"; // Código do serviço, veja a tabela abaixo.
* $arrConfig['cepOrigem'] = "99999999"; // CEP de origem, apenas números
* $arrConfig['cepDestino'] = "88888888"; // CEP do destino, apenas números
* $arrConfig['peso'] = "0.3"; // Peso da encomenda incluindo sua embalagem, em quilogramas.
* $arrConfig['formato'] = "3"; // Pode ser de 3 tipos: 1 = Caixa/pacote, 2 = Prisma/rolo, 3 = Envelope
* $arrConfig['comprimento'] = "26"; // Comprimento da encomenda, em centimetros
* $arrConfig['altura'] = "0"; // altura da encomenda em centimetros. Caso seja envelope, informe 0
* $arrConfig['largura'] = "36"; // largura em centimetros
* $arrConfig['diametro'] = "0"; // diametro da encomenda em centimetros


__O método vai retornar um objeto com as seguintes informações:__
* $obj->valor      // Valor aproximado do frete
* $obj->prazo      // Prazo aproximado do frete
* $obj->msgErro    // Informações de erro na requisição
* $obj->status     // Em caso de erro retornará FALSE, e em caso de sucesso retornará TRUE
 

## TABELA CÓDIGO DE SERVIÇOS
* 40010 = SEDEX Varejo
* 40045 = SEDEX a Cobrar Varejo
* 40215 = SEDEX 10 Varejo
* 40290 = SEDEX Hoje Varejo
* 41106 = PAC Varej
 

## Método _buscaCep($cep)_
Realiza uma busca no Webservice dos Correios, retornando o endereço do CEP informado.

__O método recebe como parâmetro o CEP a ser buscado, no formado: 99999-999__
* $obj->endereco->logradouro
* $obj->endereco->cep
* $obj->endereco->bairro
* $obj->endereco->cidade
* $obj->endereco->uf
* $obj->endereco->msgErro     // Informando o erro na requisição, ou vazio em caso de sucesso
* $obj->endereco->status      // FALSE em caso de erro, e em caso de sucesso retorna TRUE
