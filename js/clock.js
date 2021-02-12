(function() {
    angular.module('app', []).directive('countdown', [
        'Util',
        '$interval',
        function(Util,
                 $interval) {
            return {
                restrict: 'A',
                scope: {
                    date: '@'
                },
                link: function(scope,
                               element) {
                    var future;
                    future = new Date(scope.date);
                    $interval(function() {
                            var diff;
                            diff = Math.floor((future.getTime() - new Date().getTime()) / 1000);
                            return element.text(Util.dhms(diff));
                        },
                        1000);
                }
            };
        }
    ]).factory('Util', [
        function() {
            return {
                dhms: function(t) {
                    var days,
                        hours,
                        minutes,
                        seconds;
                    days = Math.floor(t / 86400);
                    t -= days * 86400;
                    hours = Math.floor(t / 3600) % 24;
                    t -= hours * 3600;
                    minutes = Math.floor(t / 60) % 60;
                    t -= minutes * 60;
                    seconds = t % 60;
                    return [days + 'd',
                        hours + 'h',
                        minutes + 'm',
                        seconds + 's'].join(' ');
                }
            };
        }
    ]);

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFBQSxPQUFPLENBQUMsTUFBUixDQUFlLEtBQWYsRUFBc0IsRUFBdEIsQ0FFQSxDQUFDLFNBRkQsQ0FFVyxXQUZYLEVBRXdCO0lBQUMsTUFBRDtJQUFTLFdBQVQ7SUFBc0IsUUFBQSxDQUFDLElBQUQ7SUFBTyxTQUFQLENBQUE7YUFDNUM7UUFBQSxRQUFBLEVBQVUsR0FBVjtRQUNBLEtBQUEsRUFDRTtVQUFBLElBQUEsRUFBTTtRQUFOLENBRkY7UUFHQSxJQUFBLEVBQU0sUUFBQSxDQUFDLEtBQUQ7SUFBUSxPQUFSLENBQUE7QUFDSixjQUFBO1VBQUEsTUFBQSxHQUFTLElBQUksSUFBSixDQUFTLEtBQUssQ0FBQyxJQUFmO1VBQ1QsU0FBQSxDQUFVLFFBQUEsQ0FBQSxDQUFBO0FBQ1IsZ0JBQUE7WUFBQSxJQUFBLEdBQU8sSUFBSSxDQUFDLEtBQUwsQ0FBVyxDQUFDLE1BQU0sQ0FBQyxPQUFQLENBQUEsQ0FBQSxHQUFtQixJQUFJLElBQUosQ0FBQSxDQUFVLENBQUMsT0FBWCxDQUFBLENBQXBCLENBQUEsR0FBNEMsSUFBdkQ7bUJBQ1AsT0FBTyxDQUFDLElBQVIsQ0FBYyxJQUFJLENBQUMsSUFBTCxDQUFVLElBQVYsQ0FBZDtVQUZRLENBQVY7SUFHRSxJQUhGO1FBRkk7TUFITjtJQUQ0QyxDQUF0QjtHQUZ4QixDQWVBLENBQUMsT0FmRCxDQWVTLE1BZlQsRUFlaUI7SUFBRSxRQUFBLENBQUEsQ0FBQTthQUNqQjtRQUNFLElBQUEsRUFBTSxRQUFBLENBQUMsQ0FBRCxDQUFBO0FBQ0osY0FBQSxJQUFBO0lBQUEsS0FBQTtJQUFBLE9BQUE7SUFBQTtVQUFBLElBQUEsR0FBTyxJQUFJLENBQUMsS0FBTCxDQUFXLENBQUEsR0FBSSxLQUFmO1VBQ1AsQ0FBQSxJQUFLLElBQUEsR0FBTztVQUNaLEtBQUEsR0FBUSxJQUFJLENBQUMsS0FBTCxDQUFXLENBQUEsR0FBSSxJQUFmLENBQUEsR0FBdUI7VUFDL0IsQ0FBQSxJQUFLLEtBQUEsR0FBUTtVQUNiLE9BQUEsR0FBVSxJQUFJLENBQUMsS0FBTCxDQUFXLENBQUEsR0FBSSxFQUFmLENBQUEsR0FBcUI7VUFDL0IsQ0FBQSxJQUFLLE9BQUEsR0FBVTtVQUNmLE9BQUEsR0FBVSxDQUFBLEdBQUk7aUJBQ2QsQ0FBRSxJQUFBLEdBQU8sR0FBVDtJQUFjLEtBQUEsR0FBUSxHQUF0QjtJQUEyQixPQUFBLEdBQVUsR0FBckM7SUFBMEMsT0FBQSxHQUFVLEdBQXBELENBQXlELENBQUMsSUFBMUQsQ0FBK0QsR0FBL0Q7UUFSSTtNQURSO0lBRGlCLENBQUY7R0FmakI7QUFBQSIsInNvdXJjZXNDb250ZW50IjpbImFuZ3VsYXIubW9kdWxlICdhcHAnLCBbXVxuXG4uZGlyZWN0aXZlICdjb3VudGRvd24nLCBbJ1V0aWwnLCAnJGludGVydmFsJywgKFV0aWwsICRpbnRlcnZhbCkgLT5cbiAgcmVzdHJpY3Q6ICdBJ1xuICBzY29wZTpcbiAgICBkYXRlOiAnQCdcbiAgbGluazogKHNjb3BlLCBlbGVtZW50KSAtPiAgICBcbiAgICBmdXR1cmUgPSBuZXcgRGF0ZSBzY29wZS5kYXRlXG4gICAgJGludGVydmFsIC0+XG4gICAgICBkaWZmID0gTWF0aC5mbG9vciAoZnV0dXJlLmdldFRpbWUoKSAtIG5ldyBEYXRlKCkuZ2V0VGltZSgpKSAvIDEwMDBcbiAgICAgIGVsZW1lbnQudGV4dCAgVXRpbC5kaG1zIGRpZmZcbiAgICAsIDEwMDBcbiAgICByZXR1cm5cbl1cblxuLmZhY3RvcnkgJ1V0aWwnLCBbIC0+XG4gIHtcbiAgICBkaG1zOiAodCkgLT5cbiAgICAgIGRheXMgPSBNYXRoLmZsb29yIHQgLyA4NjQwMFxuICAgICAgdCAtPSBkYXlzICogODY0MDBcbiAgICAgIGhvdXJzID0gTWF0aC5mbG9vcih0IC8gMzYwMCkgJSAyNFxuICAgICAgdCAtPSBob3VycyAqIDM2MDBcbiAgICAgIG1pbnV0ZXMgPSBNYXRoLmZsb29yKHQgLyA2MCkgJSA2MFxuICAgICAgdCAtPSBtaW51dGVzICogNjBcbiAgICAgIHNlY29uZHMgPSB0ICUgNjBcbiAgICAgIFsgZGF5cyArICdkJywgaG91cnMgKyAnaCcsIG1pbnV0ZXMgKyAnbScsIHNlY29uZHMgKyAncycgXS5qb2luICcgJ1xuICB9XG5dIl19
//# sourceURL=coffeescript