import { extend } from 'flarum/extend';
import LogInButtons from 'flarum/components/LogInButtons';
import LogInButton from 'flarum/components/LogInButton';

app.initializers.add('arma-auth-wordpress', function() {
	extend(LogInButtons.prototype, 'items', function(items) {
    	items.add('wordpress',
    		<LogInButton
    			className="Button LogInButton--wordpress"
    			icon="wordpress"
    			path="/auth/wordpress">
    			Log In with WP Site
    		</LogInButton>
    	);
  	});
});