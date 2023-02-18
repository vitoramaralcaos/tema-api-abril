<?php
// *** VITOR AMARAL	06/02/2023
	
require_once('../../../../wp-load.php');
	
require_once "api-veja.php";
$classe = new API_Veja();	
	
	
	$page = $_POST["page"];
	
	
	$url = 'https://veja.abril.com.br/wp-json/wp/v2/posts?page='.$page.'&per_page=10';
	$resultado = $classe->Get_Lista($url);
	
	//VERIFICANDO COMUNICACAO
	if($resultado)
	{
		if(count($resultado) == 0){
			echo "Não foi encontrado nenhum resultado.";
		}else{
			$tabela = "";

			$cont = 1;
			foreach ( $resultado as $e ){

                $url_cat = 'https://veja.abril.com.br/wp-json/wp/v2/categories/'.current($e->categories);
	            $res_cat = $classe->Get_Lista($url_cat);

                $date = new DateTimeImmutable($e->date);
				$mes = $classe->getMesPT($date->format('M'));
				$date_txt = $date->format('d').' '.$mes.' '.$date->format('Y, H').'h'.$date->format('i');

				if($page == 2){
					$tabela .= '
					<span class="separator"></span>
					';
				}

				$tabela .= '
				<div class="news-item">
					<article>
						<img class="article-img" src="'.$e->featured_media_url.'"/>
						<div class="news-info">
							<h3 class="category">'.$res_cat->slug.$mes.'</h3>
							<h2>'.$e->title->rendered.'</h2>
							<span class="news-date">
								<span class="icon-clock"></span><span class="date">'.$date_txt.'</span>
							</span>
						</div>
					</article>
				</div>
				';
				if($cont != count($resultado)){
					$tabela .= '
					<span class="separator"></span>
					';
				}
                
			$cont = $cont + 1;
			}
		
			
			echo $tabela;
		}	
	}else{
		echo "
				Ocorreu algum problema na comunicação!
		";
	}
	
	
	
	
	
	
	
?>