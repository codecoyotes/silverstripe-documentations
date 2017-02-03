<div class="block">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel" data-stickinparent="true">
					<div class="panel-header">
						Navigation
					</div>
					<div class="list list-group">
                        <% loop $Sections %>
							<a href="#{$Slug}" data-scrollto="href" data-scrollspy="href">{$Pos}. $Title</a>
                            <% if $Sections %>
								<div class="list list-group">
                                    <% loop $Sections %>
										<a href="#{$Slug}" data-scrollto="href" data-scrollspy="href">{$Up.Pos}.{$Pos}
											. $Title</a>
                                    <% end_loop %>
								</div>
                            <% end_if %>
                        <% end_loop %>
					</div>
				</div>
			</div>
			<div class="col-md-8">
                <% loop $Sections %>
					<div id="$Slug">
						<h2>{$Pos}. $Title</h2>
						<hr />
                        $Content
                        <% if $Sections %>
                            <% loop $Sections %>
								<div id="$Slug">
									<h3>{$Up.Pos}.{$Pos}. $Title</h3>
                                    $Content
								</div>
                            <% end_loop %>
                        <% end_if %>
					</div>
                <% end_loop %>
			</div>
		</div>
	</div>
</div>