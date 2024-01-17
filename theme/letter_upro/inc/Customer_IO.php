<?php

// Script for Customer IO forms we use today see attache:

function signup_form_en($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&signup=success#signup-form-" . ($args["position"] ?? "");
	?>
	<a name="signup-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=2bc27846b8da440&success_url=<?= urlencode($return_url) ?>" class="form-email">
			<input id="cio_language" name="language" type="hidden" value="<?= get_locale() == 'en_US' ? 'en' : 'sv' ?>" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields">
				<label for="email_input"></label>
				<input type="email" id="email_input" name="email" placeholder="<?php _e('Email', 'Letterlife') ?>" required>
				<button type="submit" class="btn-default"><?php _e('Sing up', 'Letterlife') ?></button>
			</div>
		</form>
		<?
		if (isset($_GET['signup']) && $_GET['signup'] == "success") {
			?>
			<br>
			<p><?php _e('Thank you for signing up!', 'Letterlife') ?></p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('signup_en', 'signup_form_en');



function signup_form_sv($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&signup=success#signup-form-" . ($args["position"] ?? "");
	?>
	<a name="signup-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=2bc27846b8da440&success_url=<?= urlencode($return_url) ?>">
			<input id="cio_language" name="language" type="hidden" value="sv" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields">
				<p>
					<label>
						<input id="email_input" name="email" type="email" placeholder="Din e-mailadress" />
					</label>
				</p>
				<p>
					<input type="submit" value="Submit">
				</p>
			</div>
		</form>
		<?
		if (isset($_GET['signup']) && $_GET['signup'] == "success") {
			?>
			<br>
			<p>Tack för din registrering!</p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('signup_sv', 'signup_form_sv');








function webinar_waitlist_form_en($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&webinar_waitlistp=success#webinar_waitlist-form-" . ($args["position"] ?? "");
	?>
	<a name="webinar_waitlist-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=59cbba7dea9446f&success_url=<?= urlencode($return_url) ?>">
			<input id="cio_webinar" name="webinar" type="hidden" value="1" />
			<input id="cio_language" name="language" type="hidden" value="en" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields">
				<p>
					<label>
						<input id="email_input" name="email" type="email" placeholder="E-mail address" />
					</label>
				</p>
				<p>
					<input type="submit" value="Submit">
				</p>
			</div>
		</form>
		<?
		if (isset($_GET['webinar_waitlist']) && $_GET['webinar_waitlist'] == "success") {
			?>
			<br>
			<p>Thank you for signing up!</p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('webinar_waitlist_en', 'webinar_waitlist_form_en');



function webinar_waitlist_form_sv($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&webinar_waitlist=success#webinar_waitlist-form-" . ($args["position"] ?? "");
	?>
	<a name="webinar_waitlist-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=59cbba7dea9446f&success_url=<?= urlencode($return_url) ?>">
			<input id="cio_webinar" name="webinar" type="hidden" value="1" />
			<input id="cio_language" name="language" type="hidden" value="sv" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields">
				<p>
					<label>
						<input id="email_input" name="email" type="email" placeholder="Din e-mailadress" />
					</label>
				</p>
				<p>
					<input type="submit" value="Submit">
				</p>
			</div>
		</form>
		<?
		if (isset($_GET['webinar_waitlist']) && $_GET['webinar_waitlist'] == "success") {
			?>
			<br>
			<p>Tack för din registrering!</p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('webinar_waitlist_sv', 'webinar_waitlist_form_sv');