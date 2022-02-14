<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class="card">
	<div class="card-body login-card-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<?= view('Myth\Auth\Views\_message_block') ?>
		<form action="<?= route_to('login') ?>" method="post">
			<?= csrf_field() ?>
			<?php if ($config->validFields === ['email']) : ?>
				<div class="input-group mb-3">
					<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
			<?php else : ?>
				<div class="input-group mb-3">
					<input type="text" class="form-control  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="input-group mb-3">
				<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<?php if ($config->allowRemembering) : ?>
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="remember" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<label for="remember">
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					</div>
				<?php endif; ?>
				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<div class="social-auth-links text-center mb-3">
			<p>- OR -</p>
			<a href="#" class="btn btn-block btn-primary">
				<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
			</a>
			<a href="#" class="btn btn-block btn-danger">
				<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
			</a>
		</div>
		<!-- /.social-auth-links -->
		<?php if ($config->allowRegistration) : ?>
			<p class="mb-1">
				<a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
			</p>
		<?php endif; ?>
		<?php if ($config->activeResetter) : ?>
			<p class="mb-0">
				<a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
			</p>
		<?php endif; ?>
	</div>
	<!-- /.login-card-body -->
</div>



<?= $this->endSection() ?>