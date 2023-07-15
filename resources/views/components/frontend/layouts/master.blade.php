<!DOCTYPE html>
<html lang="en">
	<x-frontend.layouts.partials.head/>
	<body>
		<!-- HEADER -->
		<x-frontend.layouts.partials.header/>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<x-frontend.layouts.partials.nav/>
		<!-- /NAVIGATION -->

		{{ $slot }}

		<!-- NEWSLETTER -->
		<x-frontend.layouts.partials.newsletter/>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<x-frontend.layouts.partials.footer/>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<x-frontend.layouts.partials.js/>

	</body>
</html>
