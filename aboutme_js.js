    function getGitStats(){
        var myMap = new Map();

        // setting the values
        myMap.set("ple", "Phat Le");
        myMap.set("anaashrafi", "Ana Ashrafi");
        myMap.set("AustinDuong", "Austin Duong");
        myMap.set("RoyceHong", "Royce Hong");
        myMap.set("adridutta", "Adri Dutta");
        myMap.set("GeorgeZhang98", "George Zhang");

        var obj = $.getJSON('https://api.github.com/repos/anaashrafi/Election-Essentials/contributors',
            function(data, err) {
                if (err !== "success") {
                 //   x.innerHTML = "Err";
                 } else {
                  // x.innerHTML = "No Err";
                }
                //TODO
                var repos = data;
                var totalCommits = 0;
                $(repos).each(function() {
                    if(myMap.has(this.login)){
                        var output = "<ul>";
                        output += "<li>Commits: " + this.contributions +
                            "<li>Issues: 0" +
                                "<li>Test Cases 0" +
                        "</li></li></li>";
                        totalCommits += this.contributions;
                        output += "</ul>";
                        document.getElementById(myMap.get(this.login)+"-stats").innerHTML=output;
                    }
                });
                document.getElementById("stats").innerHTML="<p> Commits: " + totalCommits +
                " | Issues: 0 | Test Cases: 0";
            });
        }