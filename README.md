# This repo is for releasing to http://shipapplause.herokuapp.com

```
$ git clone git@github.com:11tomes/kudos.git
$ cd kudos
$ git remote add upstream git@github.com:dxc04/kudos.git
$ git fetch upstream
$ git checkout main
$ git merge upstream/main
$ git checkout production
$ git merge main
$ # rebuild assets: ./sail npm run dev || docker-compose exec myapp npm run dev
$ git add public
$ git commit -m "Rebuilt Assets"
$ git push origin production # this will trigger a release, see https://dashboard.heroku.com/apps/shipapplause/activity
