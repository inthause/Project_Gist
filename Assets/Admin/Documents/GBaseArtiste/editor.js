(function() {
	"use strict";

	function projectGistGbaseArtisteEditor() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {

				scope.$watch('document.label', function (label, oldLabel) {
					//TODO SYNCHRONIZE title field
				});
			}
		};
	}

	//projectGistGbaseArtisteEditor.$inject = [];
	angular.module('RbsChange').directive('projectGistGbaseArtisteEditor', projectGistGbaseArtisteEditor);
})();