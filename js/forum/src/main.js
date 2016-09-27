import { extend } from 'flarum/extend';
import HeaderSecondary from 'flarum/components/HeaderSecondary';
import LogInButtons from 'flarum/components/LogInButtons'

app.initializers.add('arma-auth-wordpress', function() {
	extend(LogInButtons.prototype, 'items', function(items) {
    	items.add('foo', <a href="#">fsdasdasdoo</a>, -100);
  	});
});