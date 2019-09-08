import React from 'react';
import Typography from '@material-ui/core/Typography';
import Link from '@material-ui/core/Link';
import { makeStyles } from '@material-ui/core/styles';
import CssBaseline from '@material-ui/core/CssBaseline';
import Container from '@material-ui/core/Container';
import Grid from '@material-ui/core/Grid';
import Card from '@material-ui/core/Card';
import CardActions from '@material-ui/core/CardActions';
import CardContent from '@material-ui/core/CardContent';
import CardHeader from '@material-ui/core/CardHeader';
import Button from '@material-ui/core/Button';

function Copyright() {
  return (
    <Typography variant="body2" color="textSecondary" align="center">
      {'Copyright © '}
      <Link color="inherit" href="https://material-ui.com/">
        PlayMate
      </Link>{' '}
      {new Date().getFullYear()}
      {'.'}
    </Typography>
  );
}

const useStyles = makeStyles(theme => ({
  '@global': {
    body: {
      backgroundColor: theme.palette.common.white,
      justifyContent: 'center'
    },
    ul: {
      margin: 0,
      padding: 0,
    },
    li: {
      listStyle: 'none',
    },
  },
  link: {
    margin: theme.spacing(1, 1.5),
  },
  heroContent: {
    padding: theme.spacing(8, 0, 6),
  },
  cardHeader: {
    backgroundColor: theme.palette.grey[200],
  },
  cardPricing: {
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'baseline',
    marginBottom: theme.spacing(1),
  },
}));

export default function Dashboard() {
	const classes = useStyles();


	return (
	  <React.Fragment>
      <CssBaseline />

      <Container maxWidth="sm" component="main" className={classes.heroContent}>
        <Typography component="h1" variant="h2" align="center" color="textPrimary" gutterBottom>
          Select Your PlayMates
        </Typography>
        <Typography variant="h5" align="center" color="textSecondary" component="p">
          Find your next PlayMates, selected for you based off your location and interests.
        </Typography>
      </Container>

      <Container maxWidth="md" component="main">
        <Grid container spacing={1} alignItems="center" justify="center" >
            <Grid item key='match' xs={12} sm={12} md={6}>
              <Card>
                <CardHeader
                  title='FirstName'
                  subheader='Age, Location'
                  titleTypographyProps={{ align: 'center' }}
                  subheaderTypographyProps={{ align: 'center' }}
                  className={classes.cardHeader}
                />
                <CardContent>
                  <div className={classes.cardPricing}>
                    <Typography variant="body1" color="textPrimary">
                     	Here are some interests we have in common: <br />
                     	RPGs <br />
                     	Card games <br />
                     	Anything! <br />
                    </Typography>
                  </div>
                </CardContent>
                <CardActions>
                  <Button fullWidth variant="contained" color="primary">
                    Let's Play Together!
                  </Button>
                </CardActions>
                <CardActions>
                  <Button fullWidth variant="contained" color="primary">
                    I'll Keep Searching for a PlayMate!
                  </Button>
                </CardActions>
              </Card>
              <br />
              <Card>
                <CardHeader
                  title='You matched with FirstName!'
                  subheader='Age, Location'
                  titleTypographyProps={{ align: 'center' }}
                  subheaderTypographyProps={{ align: 'center' }}
                  className={classes.cardHeader}
                />
                <CardContent>
                  <div className={classes.cardPricing}>
                    <Typography variant="h4" color="textPrimary">
                     	Let's Play! <br />
                     	Contact me at: XXX-XXX-XXXX
                     	(To be pushed on top of other cards)
                    </Typography>
                  </div>
                </CardContent>
                <CardActions>
                  <Button fullWidth variant="contained" color="primary">
                    Dismiss for Now
                  </Button>
                </CardActions>
              </Card>
            </Grid>
        </Grid>
      </Container>
      </React.Fragment>
	);

}