<!DOCTYPE html>
<html>
    <head>
        <title>Lib correios - exemplo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php 
            // instanciando a classe
            require './libCorreios.php';
            $libCorreios = new LibCorreios();
        ?>
        <div>
            <h1>Lib Correios - Exemplo de uso:</h1>
            
            <h3>Busca pelo CEP 20271130</h3>
            
            <?php
                $cep = '20271130';
                $resp = $libCorreios->buscaCep($cep);
                
                if($resp->status){
                    $retorno = '<ul>'
                            . '<li>Logradouro: '.$resp->logradouro.'</li>'
                            . '<li>Bairro: '.$resp->bairro.'</li>'
                            . '<li>Cidade: '.$resp->cidade.'</li>'
                            . '<li>UF: '.$resp->uf.'</li>'
                            . '</ul>';
                }else{
                    $retorno = 'Erro na requisição: ' . $resp->msgErro;
                }
                echo $retorno;
            ?>
            
            <br/>
            <hr/>
            <br/>
            
            <h3>Calculando frete e prazo de entrega, para uma encomendo do tipo envelope, com CEP de origem 20271130, e CEP de destino 20770062</h3>
            <?php 
                $arrConfig['codigo']        = "40010";      // Código do serviço, veja a tabela abaixo.
                $arrConfig['cepOrigem']     = "20271130";   // CEP de origem, apenas números
                $arrConfig['cepDestino']    = "20770062";   // CEP do destino, apenas números
                $arrConfig['peso']          = "0.3";        // Peso da encomenda incluindo sua embalagem, em quilogramas.
                $arrConfig['formato']       = "3";          // Pode ser de 3 tipos: 1 = Caixa/pacote, 2 = Prisma/rolo, 3 = Envelope
                $arrConfig['comprimento']   = "26";         // Comprimento da encomenda, em centimetros
                $arrConfig['altura']        = "0";          // Altura da encomenda em centimetros. Caso seja envelope, informe 0
                $arrConfig['largura']       = "36";         // Largura em centimetros
                $arrConfig['diametro']      = "0";          // Diametro da encomenda em centimetros
                
                $resp = $libCorreios->calcularFrete($arrConfig);
                
                if($resp->status){
                    $retorno = '<ul>'
                            . '<li>Valor do frete: '.$resp->valor.'</li>'
                            . '<li>Prazo de entrega: '.$resp->prazo.' dia(s)</li>'
                            . '</ul>';
                }else{
                    $retorno = 'Erro na requisição: ' . $resp->msgErro;
                }
                echo $retorno;
            ?>
        </div>
    </body>
</html>
