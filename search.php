<?php
/**
 * @package Argent Neue
 */
get_header(); ?>

<?php if (is_search()): ?>

<section class="container-fluid busca dark"><div class="wrapper center-block clearfix row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <?php echo get_search_form(); ?>
	</div>
</div></section>

<?php endif; ?>

<main id="main" class="site-main" role="main"><div class="wrapper center-block clearfix row">

	<header class="page-header hidden">
		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'argent' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>

	<aside class="col-xs-12 col-sm-4 col-md-4 ">
		<div class="alert alert-info" role="alert">
			<p>
				<strong></strong>Estamos trabalhando para que você consiga achar tudo o que procura através de uma única busca. Para melhorar nosso entendimento do que as pessoas esperam do SNIIC, estamos coletando e analisando os termos mais buscados.
			</p>
		</div>

		<button class="visible-xs col-xs-12 btn btn-link"
						type="button"
						data-toggle="collapse"
						data-target="#collapseSearchOptions"
						aria-expanded="false"
						aria-controls="collapseSearchOptions">
			<a>Mais opções</a>
		</button>

		<div class="collapse collapse-xs" id="collapseSearchOptions"><aside>
			<h4>Termos populares</h4>
			<ul>
				<li><a>Lorem ipsum</a></li>
				<li><a>Donec ut libero sed arcu vehicula</a></li>
				<li><a>Donec sed odio eros</a></li>
				<li><a>Curabitur ornare</a></li>
				<li><a>Fusce vel volutpat</a></li>
				<li><a>Nam sagittis nisi dui</a></li>
				<li><a>Curabitur lobortis nisl a enim congue…</a></li><!-- TODO: Do not forget *ellipsis* -->
			</ul>
		</aside>

		<aside class="filter">
			<h4>Filtros</h4>
			<div class="form-group">
      <label class="title" for="select-area">Área do conhecimento</label>
			<?php wp_dropdown_categories(array(

					'orderby'            => 'NAME',
					'show_option_none'	 => 'Selecione uma área',
					'order'              => 'ASC',
					'hide_empty'         => false,
					'selected'           => 0, //TODO preencher
					'name'               => 'area',
					'id'                 => 'select-area',
					'class'              => 'postform form-control',
					'depth'              => 0,
					'tab_index'          => 0,
					'taxonomy'           => 'area',
					'hide_if_empty'      => false,
					'value_field'	     => 'slug',
				)); ?>
			</div>
			<div class="form-group">
      <label class="title" for="select-tipo">Tipo de publicação</label>
			<?php wp_dropdown_categories(array(

					'orderby'            => 'NAME',
					'show_option_none'	 => 'Selecione um tipo',
					'order'              => 'ASC',
					'hide_empty'         => false,
					'selected'           => 0, //TODO preencher
					'name'               => 'tipo',
					'id'                 => 'select-tipo',
					'class'              => 'postform form-control',
					'depth'              => 0,
					'tab_index'          => 0,
					'taxonomy'           => 'tipo',
					'hide_if_empty'      => false,
					'value_field'	     => 'slug',
				)); ?>
				</div>
		</aside>

		<script type="text/javascript">
			<!--
			var area = document.getElementById("select-area");
			var tipo = document.getElementById("select-tipo");
			function onAreaChange() {
				if ( area.options[area.selectedIndex].value != -1 ) {
					location.href = "<?php echo esc_url( home_url( '/' ) ); ?>/area/"+area.options[area.selectedIndex].value;
				}
			}
			tipo.onchange = onAreaChange;

			function onTipoChange() {
				if ( tipo.options[tipo.selectedIndex].value != -1 ) {
					location.href = "<?php echo esc_url( home_url( '/' ) ); ?>/tipo/"+tipo.options[tipo.selectedIndex].value;
				}
			}
			tipo.onchange = onTipoChange;
			-->
		</script>

		<?php if (get_search_query()): ?>
			<aside>
				<h4>Buscar nas plataformas</h4>
				<ul>
					<li>
						<h5 class="brand-heading">
							<img src="<?php echo get_template_directory_uri() ?>/assets/sub.glyph.mapas.svg"/>
							<span>Mapas</span>.cultura.gov.br</h5>
						<ul>
							<li><a href="http://mapas.cultura.gov.br/busca/##(global:(enabled:(agent:!t),filterEntity:agent),agent:(keyword:'<?php echo get_search_query(); ?>'))" target="blank">
								<em><?php echo get_search_query(); ?></em> nos agentes
							</a></li>
							<li><a href="http://mapas.cultura.gov.br/busca/##(global:(enabled:(space:!t),filterEntity:space),space:(keyword:'<?php echo get_search_query(); ?>'))" target="blank">
								<em><?php echo get_search_query(); ?></em> nos espaços
							</a></li>
							<li><a href="http://mapas.cultura.gov.br/busca/##(global:(enabled:(event:!t),filterEntity:event),space:(keyword:'<?php echo get_search_query(); ?>'))" target="blank">
								<em><?php echo get_search_query(); ?></em> nos eventos
							</a></li>
						</ul>
					</li>
					<li>
						<h5 class="brand-heading">
							<img src="<?php echo get_template_directory_uri() ?>/assets/sub.glyph.dados.svg"/>
							<span>Dados</span>.cultura.gov.br</h5>
							<ul>
								<li><a href="http://dados.cultura.gov.br/dataset?q=<?php echo get_search_query(); ?>" target="blank">
									<em><?php echo get_search_query(); ?></em> nos dados abertos
								</a></li>
							</ul>
					</li>
				</ul>
			</aside>
		<?php endif; ?>
	</div></aside>

	<section class="col-xs-12 col-sm-8 col-md-8">

	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content/content', get_post_format() ); ?>

	<?php endwhile; ?>

	<?php the_posts_navigation(); ?>

	<?php else : ?>

		<h1>Nenhum conteúdo encontrado</h1>

	<?php endif; ?>
	</section>
</main>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
