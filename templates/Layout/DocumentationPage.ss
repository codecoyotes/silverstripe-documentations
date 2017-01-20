<div class="container">
	<div class="row">
		<div class="col-md-4">
			<ul>
                <% loop $Sections %>
					<li>
						<a href="$Link">{$Pos}. $Title</a>
                        <% if $Sections %>
							<ul>
                                <% loop $Sections %>
									<li>
										<a href="$Link">{$Up.Pos}.{$Pos}. $Title</a>
									</li>
                                <% end_loop %>
							</ul>
                        <% end_if %>
					</li>
                <% end_loop %>
			</ul>
		</div>
		<div class="col-md-8">
            <% loop $Sections %>
				<h2>{$Pos}. $Title</h2>
                $Content
                <% if $Sections %>
                    <% loop $Sections %>
						<h3>{$Up.Pos}.{$Pos}. $Title</h3>
                        $Content
                    <% end_loop %>
                <% end_if %>
            <% end_loop %>
		</div>
	</div>
</div>