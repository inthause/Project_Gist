(function() {
	"use strict";

	function projectGistGelementEditor() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				scope.$watch('document.label', function (label, oldLabel) {
					//TODO SYNCHRONIZE title field
				});
			}
		};
	}

	//projectGistGelementEditor.$inject = [];
	angular.module('RbsChange').directive('projectGistGelementEditor', projectGistGelementEditor);
})();