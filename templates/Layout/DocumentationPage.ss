<div class="container">
    <div class="row">
        <div class="col-md-4">
            <% loop $Sections %>
                <a href="$Link">$Title</a>
            <% end_loop %>
        </div>
        <div class="col-md-8">
            <% loop $Sections %>
				<h2>$Title</h2>
                $Content
            <% end_loop %>
        </div>
    </div>
</div>